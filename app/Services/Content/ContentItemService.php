<?php
/**
 * ZELOCORECMS — Content Item Service
 * Manages content CRUD with validation, versioning, and hook integration.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Services\Content;

use App\Models\ContentItem;
use App\Models\ContentType;
use App\Models\ContentVersion;
use App\Services\Hooks\HookRegistry;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class ContentItemService
{
    public function __construct(
        private readonly HookRegistry $hooks,
        private readonly ContentTypeService $typeService,
    ) {}

    /**
     * Get paginated content items for a type.
     */
    public function findMany(
        string $workspaceId,
        string $typeSlug,
        array $query = []
    ): LengthAwarePaginator {
        $q = ContentItem::where('workspace_id', $workspaceId)
            ->where('content_type_slug', $typeSlug);

        // Filter by status
        if (!empty($query['status'])) {
            $q->where('status', $query['status']);
        } else {
            // Default: exclude trash
            $q->whereNotIn('status', ['trash']);
        }

        // Full-text search
        if (!empty($query['search'])) {
            $search = $query['search'];
            $q->where(function ($q) use ($search) {
                $q->whereRaw('JSON_SEARCH(data, "one", ?) IS NOT NULL', ["%{$search}%"])
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortField = $query['sort_by'] ?? 'created_at';
        $sortDir = $query['sort_dir'] ?? 'desc';
        $allowedSorts = ['created_at', 'updated_at', 'published_at', 'status', 'slug'];

        if (in_array($sortField, $allowedSorts, true)) {
            $q->orderBy($sortField, $sortDir === 'asc' ? 'asc' : 'desc');
        }

        $perPage = min((int) ($query['per_page'] ?? 20), 100);

        return $q->paginate($perPage);
    }

    /**
     * Get a single content item by ID or slug.
     */
    public function findOne(string $workspaceId, string $typeSlug, string $id): ?ContentItem
    {
        return ContentItem::where('workspace_id', $workspaceId)
            ->where('content_type_slug', $typeSlug)
            ->where(function ($q) use ($id) {
                $q->where('id', $id)->orWhere('slug', $id);
            })
            ->first();
    }

    /**
     * Create a new content item.
     */
    public function create(
        string $workspaceId,
        string $typeSlug,
        array $data,
        ?string $userId = null
    ): ContentItem {
        $contentType = $this->typeService->findBySlug($workspaceId, $typeSlug);

        if (!$contentType) {
            throw new \InvalidArgumentException("Content type [{$typeSlug}] not found.");
        }

        // Validate data against schema
        $validated = $this->validateAgainstSchema($data, $contentType);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = $this->generateSlug($workspaceId, $typeSlug, $validated);
        }

        // Apply pre-create filters (plugins can modify data)
        $validated = $this->hooks->applyFilters('content.beforeCreate', $validated, $typeSlug);

        $status = $data['status'] ?? 'draft';

        $item = ContentItem::create([
            'workspace_id'       => $workspaceId,
            'content_type_id'    => $contentType->id,
            'content_type_slug'  => $typeSlug,
            'slug'               => $validated['slug'] ?? null,
            'status'             => $status,
            'data'               => $validated,
            'meta'               => $data['meta'] ?? null,
            'version'            => 1,
            'published_at'       => $status === 'published' ? now() : null,
            'scheduled_at'       => $status === 'scheduled' ? ($data['scheduled_at'] ?? null) : null,
            'created_by'         => $userId,
            'updated_by'         => $userId,
        ]);

        // Save initial version
        $this->saveVersion($item, $userId);

        // Fire post-create action
        $this->hooks->doAction('content.afterCreate', $item);

        return $item->fresh();
    }

    /**
     * Update an existing content item.
     */
    public function update(
        ContentItem $item,
        array $data,
        ?string $userId = null
    ): ContentItem {
        $contentType = $item->contentType;

        // Validate against schema
        $validated = $this->validateAgainstSchema($data['data'] ?? $data, $contentType);

        // Apply pre-update filter
        $validated = $this->hooks->applyFilters('content.beforeUpdate', $validated, $item->content_type_slug, $item->id);

        $oldData = $item->data;
        $newVersion = $item->version + 1;

        $item->update([
            'data'       => $validated,
            'meta'       => $data['meta'] ?? $item->meta,
            'slug'       => $data['slug'] ?? $item->slug,
            'status'     => $data['status'] ?? $item->status,
            'version'    => $newVersion,
            'updated_by' => $userId,
        ]);

        // Handle publish/unpublish
        if ($data['status'] ?? null === 'published' && $item->published_at === null) {
            $item->update(['published_at' => now()]);
        }

        // Save version snapshot
        $this->saveVersion($item, $userId);

        // Fire post-update action
        $this->hooks->doAction('content.afterUpdate', $item, $oldData);

        return $item->fresh();
    }

    /**
     * Publish a draft item.
     */
    public function publish(ContentItem $item, ?string $userId = null): ContentItem
    {
        $data = $this->hooks->applyFilters('content.beforePublish', $item->data, $item->content_type_slug);

        $item->update([
            'status'       => 'published',
            'published_at' => $item->published_at ?? now(),
            'data'         => $data,
            'updated_by'   => $userId,
        ]);

        $this->hooks->doAction('content.afterPublish', $item);

        return $item->fresh();
    }

    /**
     * Unpublish (move back to draft).
     */
    public function unpublish(ContentItem $item, ?string $userId = null): ContentItem
    {
        $item->update(['status' => 'draft', 'updated_by' => $userId]);
        $this->hooks->doAction('content.afterUnpublish', $item);
        return $item->fresh();
    }

    /**
     * Move item to trash.
     */
    public function trash(ContentItem $item, ?string $userId = null): ContentItem
    {
        $item->update(['status' => 'trash', 'updated_by' => $userId]);
        $this->hooks->doAction('content.afterTrash', $item);
        return $item->fresh();
    }

    /**
     * Permanently delete an item.
     */
    public function delete(ContentItem $item): bool
    {
        $this->hooks->doAction('content.beforeDelete', $item);

        // Delete versions first
        $item->contentVersions()->delete();

        $deleted = $item->delete();

        $this->hooks->doAction('content.afterDelete', $item->id, $item->content_type_slug);

        return $deleted;
    }

    /**
     * Restore a specific version.
     */
    public function restoreVersion(ContentItem $item, int $versionNumber, ?string $userId = null): ContentItem
    {
        $version = ContentVersion::where('content_item_id', $item->id)
            ->where('version', $versionNumber)
            ->firstOrFail();

        return $this->update($item, ['data' => $version->data, 'meta' => $version->meta], $userId);
    }

    /**
     * Get version history for a content item.
     */
    public function getVersions(ContentItem $item): \Illuminate\Database\Eloquent\Collection
    {
        return ContentVersion::where('content_item_id', $item->id)
            ->orderBy('version', 'desc')
            ->limit(50)
            ->get();
    }

    // ─── Private Helpers ───────────────────────────────────────────────────

    /**
     * Validate content data against the content type's schema.
     */
    private function validateAgainstSchema(array $data, ContentType $contentType): array
    {
        $schema = $contentType->schema ?? [];
        $validated = [];
        $errors = [];

        foreach ($schema as $field) {
            $name = $field['name'];
            $value = $data[$name] ?? null;

            // Check required fields
            if (!empty($field['required']) && ($value === null || $value === '')) {
                $errors[] = "Field [{$name}] is required.";
                continue;
            }

            // Type coercion and basic validation
            $validated[$name] = $this->coerceFieldValue($value, $field);
        }

        if (!empty($errors)) {
            throw new \InvalidArgumentException(implode(' ', $errors));
        }

        return $validated;
    }

    /**
     * Coerce and sanitize a field value based on its type.
     */
    private function coerceFieldValue(mixed $value, array $field): mixed
    {
        if ($value === null || $value === '') {
            return $field['default'] ?? null;
        }

        return match ($field['type']) {
            'text', 'textarea', 'email', 'url', 'color', 'slug'
                => is_string($value) ? trim(strip_tags($value)) : null,
            'richtext'
                => is_string($value) ? $value : null, // Sanitized at output time
            'number'
                => is_numeric($value) ? (int) $value : null,
            'decimal'
                => is_numeric($value) ? (float) $value : null,
            'boolean'
                => filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            'date'
                => is_string($value) ? date('Y-m-d', strtotime($value)) : null,
            'datetime'
                => is_string($value) ? date('Y-m-d H:i:s', strtotime($value)) : null,
            'select'
                => in_array($value, $field['options'] ?? [], true) ? $value : null,
            'multiselect', 'tags'
                => is_array($value) ? array_values(array_filter($value, 'is_string')) : [],
            'json', 'blocks', 'repeater', 'coordinates'
                => is_array($value) ? $value : (is_string($value) ? json_decode($value, true) : null),
            'media', 'relation'
                => is_string($value) ? $value : null, // UUID reference
            default
                => $value,
        };
    }

    /**
     * Generate a unique slug for a content item.
     */
    private function generateSlug(string $workspaceId, string $typeSlug, array $data): string
    {
        // Try to find a text field to use for slug generation
        $titleFields = ['title', 'name', 'heading'];

        $baseText = null;
        foreach ($titleFields as $field) {
            if (!empty($data[$field])) {
                $baseText = $data[$field];
                break;
            }
        }

        if (!$baseText) {
            $baseText = Str::random(8);
        }

        $baseSlug = Str::slug($baseText);
        $slug = $baseSlug;
        $counter = 2;

        // Ensure uniqueness within the workspace + type
        while (
            ContentItem::where('workspace_id', $workspaceId)
                ->where('content_type_slug', $typeSlug)
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Save a version snapshot of the content item.
     */
    private function saveVersion(ContentItem $item, ?string $userId): void
    {
        // Enforce revision limit
        $limit = config('app.cms.content.revisions_limit', 100);

        if ($limit > 0) {
            $count = ContentVersion::where('content_item_id', $item->id)->count();

            if ($count >= $limit) {
                // Delete oldest versions beyond limit
                ContentVersion::where('content_item_id', $item->id)
                    ->orderBy('version', 'asc')
                    ->limit($count - $limit + 1)
                    ->delete();
            }
        }

        ContentVersion::create([
            'content_item_id' => $item->id,
            'version'         => $item->version,
            'data'            => $item->data,
            'meta'            => $item->meta,
            'created_by'      => $userId,
        ]);
    }
}
