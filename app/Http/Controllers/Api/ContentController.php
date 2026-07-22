<?php
/**
 * ZELOCORECMS — Content Controller
 * REST API for content types and content items.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use App\Models\ContentType;
use App\Services\Content\ContentItemService;
use App\Services\Content\ContentTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct(
        private readonly ContentItemService $itemService,
        private readonly ContentTypeService $typeService,
    ) {}

    // ─── Content Types ──────────────────────────────────────────────────────

    /**
     * GET /api/v1/content-types
     * List all content types in workspace.
     */
    public function indexTypes(Request $request): JsonResponse
    {
        $workspaceId = $request->workspace_id;
        $types = $this->typeService->getAllForWorkspace($workspaceId);

        return $this->success(['data' => $types]);
    }

    /**
     * POST /api/v1/content-types
     * Create a new content type.
     */
    public function storeType(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'slug'     => ['nullable', 'string', 'max:100', 'regex:/^[a-z][a-z0-9_-]*$/'],
            'schema'   => ['required', 'array'],
            'settings' => ['nullable', 'array'],
        ]);

        try {
            $type = $this->typeService->create($request->workspace_id, $validated);
            return $this->success(['data' => $type], 201);
        } catch (\InvalidArgumentException $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * GET /api/v1/content-types/{slug}
     */
    public function showType(Request $request, string $workspaceSlug, string $slug): JsonResponse
    {
        $type = $this->typeService->findBySlug($request->workspace_id, $slug);

        if (!$type) {
            return $this->error("Content type [{$slug}] not found.", 404);
        }

        return $this->success(['data' => $type]);
    }

    /**
     * PATCH /api/v1/content-types/{slug}
     */
    public function updateType(Request $request, string $workspaceSlug, string $slug): JsonResponse
    {
        $type = $this->typeService->findBySlug($request->workspace_id, $slug);

        if (!$type) {
            return $this->error("Content type [{$slug}] not found.", 404);
        }

        try {
            $updated = $this->typeService->update($type, $request->all());
            return $this->success(['data' => $updated]);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * DELETE /api/v1/content-types/{slug}
     */
    public function destroyType(Request $request, string $workspaceSlug, string $slug): JsonResponse
    {
        $type = $this->typeService->findBySlug($request->workspace_id, $slug);

        if (!$type) {
            return $this->error("Content type [{$slug}] not found.", 404);
        }

        try {
            $this->typeService->delete($type);
            return $this->success(['message' => "Content type [{$slug}] deleted."]);
        } catch (\RuntimeException $e) {
            return $this->error($e->getMessage(), 403);
        }
    }

    /**
     * GET /api/v1/field-types
     * List all available field types.
     */
    public function fieldTypes(): JsonResponse
    {
        return $this->success(['data' => $this->typeService->getFieldTypes()]);
    }

    // ─── Content Items ──────────────────────────────────────────────────────

    /**
     * GET /api/v1/content/{type}
     * List content items (paginated + filtered).
     */
    public function index(Request $request, string $workspaceSlug, string $type): JsonResponse
    {
        $workspaceId = $request->workspace_id;
        $contentType = $this->typeService->findBySlug($workspaceId, $type);

        if (!$contentType) {
            return $this->error("Content type [{$type}] not found.", 404);
        }

        $result = $this->itemService->findMany($workspaceId, $type, $request->query());

        return response()->json([
            'success' => true,
            'data'    => $result->items(),
            'meta'    => [
                'total'        => $result->total(),
                'page'         => $result->currentPage(),
                'per_page'     => $result->perPage(),
                'total_pages'  => $result->lastPage(),
                'has_more'     => $result->hasMorePages(),
            ],
        ]);
    }

    /**
     * POST /api/v1/content/{type}
     * Create a new content item.
     */
    public function store(Request $request, string $workspaceSlug, string $type): JsonResponse
    {
        $workspaceId = $request->workspace_id;

        $contentType = $this->typeService->findBySlug($workspaceId, $type);

        if (!$contentType) {
            return $this->error("Content type [{$type}] not found.", 404);
        }

        try {
            $item = $this->itemService->create(
                $workspaceId,
                $type,
                $request->all(),
                $request->user()?->id
            );

            return $this->success(['data' => $item], 201);
        } catch (\InvalidArgumentException $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * GET /api/v1/content/{type}/{id}
     * Get a single content item by ID or slug.
     */
    public function show(Request $request, string $workspaceSlug, string $type, string $id): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        return $this->success(['data' => $item]);
    }

    /**
     * PATCH /api/v1/content/{type}/{id}
     * Update a content item.
     */
    public function update(Request $request, string $workspaceSlug, string $type, string $id): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        try {
            $updated = $this->itemService->update($item, $request->all(), $request->user()?->id);
            return $this->success(['data' => $updated]);
        } catch (\InvalidArgumentException $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * DELETE /api/v1/content/{type}/{id}
     * Delete a content item.
     */
    public function destroy(Request $request, string $workspaceSlug, string $type, string $id): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        $this->itemService->delete($item);

        return $this->success(['message' => 'Content item deleted.']);
    }

    /**
     * POST /api/v1/content/{type}/{id}/publish
     * Publish a draft item.
     */
    public function publish(Request $request, string $workspaceSlug, string $type, string $id): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        $published = $this->itemService->publish($item, $request->user()?->id);

        return $this->success(['data' => $published]);
    }

    /**
     * POST /api/v1/content/{type}/{id}/unpublish
     * Move published item back to draft.
     */
    public function unpublish(Request $request, string $workspaceSlug, string $type, string $id): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        $unpublished = $this->itemService->unpublish($item, $request->user()?->id);

        return $this->success(['data' => $unpublished]);
    }

    /**
     * GET /api/v1/content/{type}/{id}/versions
     * Get version history.
     */
    public function versions(Request $request, string $workspaceSlug, string $type, string $id): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        $versions = $this->itemService->getVersions($item);

        return $this->success(['data' => $versions]);
    }

    /**
     * POST /api/v1/content/{type}/{id}/restore/{version}
     * Restore a specific version.
     */
    public function restoreVersion(Request $request, string $workspaceSlug, string $type, string $id, int $version): JsonResponse
    {
        $item = $this->itemService->findOne($request->workspace_id, $type, $id);

        if (!$item) {
            return $this->error("Content item not found.", 404);
        }

        try {
            $restored = $this->itemService->restoreVersion($item, $version, $request->user()?->id);
            return $this->success(['data' => $restored]);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    // ─── Helpers ────────────────────────────────────────────────────────────

    private function success(array $data, int $status = 200): JsonResponse
    {
        return response()->json(['success' => true, ...$data], $status);
    }

    private function error(string $message, int $status = 400): JsonResponse
    {
        return response()->json(['success' => false, 'message' => $message], $status);
    }
}
