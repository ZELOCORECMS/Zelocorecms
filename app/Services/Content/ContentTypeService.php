<?php
/**
 * ZELOCORECMS — Content Type Service
 * Manages content type definitions (like WordPress custom post types, but typed).
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Services\Content;

use App\Models\ContentType;
use App\Models\Workspace;
use App\Services\Hooks\HookRegistry;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ContentTypeService
{
    // Built-in field types supported by ZELOCORECMS
    public const FIELD_TYPES = [
        'text'          => ['label' => 'Short Text', 'icon' => 'text'],
        'textarea'      => ['label' => 'Long Text', 'icon' => 'align-left'],
        'richtext'      => ['label' => 'Rich Text (Editor)', 'icon' => 'file-text'],
        'number'        => ['label' => 'Number', 'icon' => 'hash'],
        'decimal'       => ['label' => 'Decimal', 'icon' => 'hash'],
        'boolean'       => ['label' => 'Boolean (True/False)', 'icon' => 'toggle-left'],
        'date'          => ['label' => 'Date', 'icon' => 'calendar'],
        'datetime'      => ['label' => 'Date & Time', 'icon' => 'clock'],
        'time'          => ['label' => 'Time', 'icon' => 'clock'],
        'email'         => ['label' => 'Email', 'icon' => 'mail'],
        'url'           => ['label' => 'URL', 'icon' => 'link'],
        'slug'          => ['label' => 'Slug (URL-friendly)', 'icon' => 'link-2'],
        'color'         => ['label' => 'Color', 'icon' => 'droplet'],
        'select'        => ['label' => 'Dropdown Select', 'icon' => 'chevron-down'],
        'multiselect'   => ['label' => 'Multi-select', 'icon' => 'check-square'],
        'tags'          => ['label' => 'Tags', 'icon' => 'tag'],
        'media'         => ['label' => 'Media (image/file)', 'icon' => 'image'],
        'relation'      => ['label' => 'Relation to another type', 'icon' => 'git-merge'],
        'json'          => ['label' => 'JSON (custom data)', 'icon' => 'code'],
        'blocks'        => ['label' => 'Dynamic Zone (blocks)', 'icon' => 'layers'],
        'repeater'      => ['label' => 'Repeater group', 'icon' => 'list'],
        'coordinates'   => ['label' => 'Geographic Coordinates', 'icon' => 'map-pin'],
    ];

    public function __construct(
        private readonly HookRegistry $hooks,
    ) {}

    /**
     * Get all content types for a workspace.
     */
    public function getAllForWorkspace(string $workspaceId): Collection
    {
        return ContentType::where('workspace_id', $workspaceId)
            ->orderBy('name')
            ->get();
    }

    /**
     * Get a single content type by slug.
     */
    public function findBySlug(string $workspaceId, string $slug): ?ContentType
    {
        return ContentType::where('workspace_id', $workspaceId)
            ->where('slug', $slug)
            ->first();
    }

    /**
     * Create a new content type.
     */
    public function create(string $workspaceId, array $data): ContentType
    {
        $this->validateSchema($data['schema'] ?? []);

        // Auto-add system fields to schema
        $schema = $this->injectSystemFields($data['schema'] ?? []);

        // Apply hook: plugins can modify the schema before saving
        $schema = $this->hooks->applyFilters('content.schema', $schema, $data['slug'] ?? '');

        $contentType = ContentType::create([
            'workspace_id' => $workspaceId,
            'slug'         => Str::slug($data['slug'] ?? $data['name']),
            'name'         => $data['name'],
            'schema'       => $schema,
            'settings'     => $data['settings'] ?? null,
            'is_system'    => false,
        ]);

        $this->hooks->doAction('contentType.afterCreate', $contentType);

        return $contentType;
    }

    /**
     * Update an existing content type.
     */
    public function update(ContentType $contentType, array $data): ContentType
    {
        if ($contentType->is_system) {
            throw new \RuntimeException('Cannot modify a system content type.');
        }

        if (isset($data['schema'])) {
            $this->validateSchema($data['schema']);
            $data['schema'] = $this->injectSystemFields($data['schema']);
            $data['schema'] = $this->hooks->applyFilters(
                'content.schema',
                $data['schema'],
                $contentType->slug
            );
        }

        $contentType->update($data);

        $this->hooks->doAction('contentType.afterUpdate', $contentType);

        return $contentType->fresh();
    }

    /**
     * Delete a content type (and all its content items).
     */
    public function delete(ContentType $contentType): bool
    {
        if ($contentType->is_system) {
            throw new \RuntimeException('Cannot delete a system content type.');
        }

        $this->hooks->doAction('contentType.beforeDelete', $contentType);

        // Delete all content items of this type first
        $contentType->contentItems()->delete();

        return $contentType->delete();
    }

    /**
     * Get all available field types (for admin UI).
     */
    public function getFieldTypes(): array
    {
        // Allow plugins to add custom field types
        return $this->hooks->applyFilters('content.fieldTypes', self::FIELD_TYPES);
    }

    /**
     * Validate a field schema definition.
     *
     * @throws \InvalidArgumentException
     */
    public function validateSchema(array $schema): void
    {
        $validTypes = array_keys(self::FIELD_TYPES);

        foreach ($schema as $field) {
            if (empty($field['name'])) {
                throw new \InvalidArgumentException('Each field must have a name.');
            }

            if (!preg_match('/^[a-z][a-z0-9_]*$/', $field['name'])) {
                throw new \InvalidArgumentException(
                    "Field name [{$field['name']}] must be lowercase alphanumeric with underscores."
                );
            }

            if (empty($field['type'])) {
                throw new \InvalidArgumentException("Field [{$field['name']}] must have a type.");
            }

            // Allow plugins to register custom field types
            $allowedTypes = $this->hooks->applyFilters('content.allowedFieldTypes', $validTypes);

            if (!in_array($field['type'], $allowedTypes, true)) {
                throw new \InvalidArgumentException(
                    "Field [{$field['name']}] has unknown type [{$field['type']}]. " .
                    "Valid types: " . implode(', ', $allowedTypes)
                );
            }

            // Validate select options
            if ($field['type'] === 'select' && empty($field['options'])) {
                throw new \InvalidArgumentException(
                    "Field [{$field['name']}] is a 'select' type and must have options array."
                );
            }

            // Validate relation
            if ($field['type'] === 'relation' && empty($field['target_type'])) {
                throw new \InvalidArgumentException(
                    "Field [{$field['name']}] is a 'relation' type and must have target_type."
                );
            }
        }
    }

    /**
     * Add system fields that every content item has.
     */
    private function injectSystemFields(array $schema): array
    {
        // Check if slug field already exists
        $hasSlug = collect($schema)->contains('name', 'slug');

        if (!$hasSlug) {
            // Prepend a slug field
            array_unshift($schema, [
                'name'       => 'slug',
                'type'       => 'slug',
                'label'      => 'URL Slug',
                'required'   => false,
                'is_system'  => true,
                'help'       => 'Auto-generated from the first text field if left empty.',
            ]);
        }

        return $schema;
    }

    /**
     * Create the default system content types for a new workspace.
     */
    public function seedSystemTypes(Workspace $workspace): void
    {
        // Page type (like WordPress pages)
        $this->createSystemType($workspace->id, 'page', 'Pages', [
            ['name' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true],
            ['name' => 'content', 'type' => 'richtext', 'label' => 'Content'],
            ['name' => 'excerpt', 'type' => 'textarea', 'label' => 'Excerpt'],
            ['name' => 'featured_image', 'type' => 'media', 'label' => 'Featured Image'],
            ['name' => 'seo_title', 'type' => 'text', 'label' => 'SEO Title'],
            ['name' => 'seo_description', 'type' => 'textarea', 'label' => 'SEO Description'],
            ['name' => 'is_homepage', 'type' => 'boolean', 'label' => 'Set as Homepage'],
        ]);

        // Post type (like WordPress posts)
        $this->createSystemType($workspace->id, 'post', 'Blog Posts', [
            ['name' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true],
            ['name' => 'content', 'type' => 'richtext', 'label' => 'Content'],
            ['name' => 'excerpt', 'type' => 'textarea', 'label' => 'Excerpt'],
            ['name' => 'featured_image', 'type' => 'media', 'label' => 'Featured Image'],
            ['name' => 'categories', 'type' => 'tags', 'label' => 'Categories'],
            ['name' => 'tags', 'type' => 'tags', 'label' => 'Tags'],
            ['name' => 'author', 'type' => 'relation', 'label' => 'Author', 'target_type' => 'user'],
            ['name' => 'seo_title', 'type' => 'text', 'label' => 'SEO Title'],
            ['name' => 'seo_description', 'type' => 'textarea', 'label' => 'SEO Description'],
        ]);

        // Navigation menus type
        $this->createSystemType($workspace->id, 'navigation', 'Navigation Menus', [
            ['name' => 'title', 'type' => 'text', 'label' => 'Menu Name', 'required' => true],
            ['name' => 'items', 'type' => 'json', 'label' => 'Menu Items'],
            ['name' => 'location', 'type' => 'select', 'label' => 'Menu Location', 'options' => ['primary', 'footer', 'sidebar']],
        ]);
    }

    private function createSystemType(string $workspaceId, string $slug, string $name, array $schema): void
    {
        // Don't recreate if it already exists
        if (ContentType::where('workspace_id', $workspaceId)->where('slug', $slug)->exists()) {
            return;
        }

        ContentType::create([
            'workspace_id' => $workspaceId,
            'slug'         => $slug,
            'name'         => $name,
            'schema'       => $this->injectSystemFields($schema),
            'settings'     => null,
            'is_system'    => true,
        ]);
    }
}
