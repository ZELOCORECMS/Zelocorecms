<?php
/**
 * ZELOCORECMS — Media Controller
 * Manages media uploads and library.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * GET /api/v1/workspaces/{slug}/media
     */
    public function index(Request $request): JsonResponse
    {
        $media = Media::where('workspace_id', $request->workspace_id)
            ->orderBy('created_at', 'desc')
            ->paginate(24);

        return response()->json([
            'success' => true,
            'data'    => $media->items(),
            'meta'    => [
                'total'     => $media->total(),
                'page'      => $media->currentPage(),
                'per_page'  => $media->perPage(),
                'last_page' => $media->lastPage(),
            ],
        ]);
    }

    /**
     * POST /api/v1/workspaces/{slug}/media/upload
     */
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'max:' . (config('zelocms.media.max_upload_size') / 1024)],
        ]);

        $file = $request->file('file');
        $disk = config('zelocms.media.default_disk', 'local');
        
        $path = $file->storeAs(
            "workspaces/{$request->workspace_id}/media/" . date('Y/m'),
            Str::random(40) . '.' . $file->getClientOriginalExtension(),
            $disk
        );

        $media = Media::create([
            'workspace_id'  => $request->workspace_id,
            'filename'      => basename($path),
            'original_name' => $file->getClientOriginalName(),
            'mime_type'     => $file->getClientMimeType(),
            'size'          => $file->getSize(),
            'storage_path'  => $path,
            'disk'          => $disk,
            'created_by'    => $request->user()?->id,
        ]);

        return response()->json(['success' => true, 'data' => $media], 201);
    }

    /**
     * GET /api/v1/workspaces/{slug}/media/{id}
     */
    public function show(Request $request, string $id): JsonResponse
    {
        $media = Media::where('workspace_id', $request->workspace_id)->findOrFail($id);
        return response()->json(['success' => true, 'data' => $media]);
    }

    /**
     * PATCH /api/v1/workspaces/{slug}/media/{id}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $media = Media::where('workspace_id', $request->workspace_id)->findOrFail($id);

        $validated = $request->validate([
            'alt_text' => ['nullable', 'string'],
            'caption'  => ['nullable', 'string'],
        ]);

        $media->update($validated);

        return response()->json(['success' => true, 'data' => $media]);
    }

    /**
     * DELETE /api/v1/workspaces/{slug}/media/{id}
     */
    public function destroy(Request $request, string $id): JsonResponse
    {
        $media = Media::where('workspace_id', $request->workspace_id)->findOrFail($id);

        if (Storage::disk($media->disk)->exists($media->storage_path)) {
            Storage::disk($media->disk)->delete($media->storage_path);
        }

        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted.']);
    }
}
