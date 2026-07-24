<?php

/**
 * ZELOCORECMS — Audit Controller
 * Read-only access to audit logs.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * GET /api/v1/workspaces/{slug}/audit
     */
    public function index(Request $request): JsonResponse
    {
        $logs = AuditLog::where('workspace_id', $request->workspace_id)
            ->with('user:id,email,first_name,last_name')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return response()->json([
            'success' => true,
            'data' => $logs->items(),
            'meta' => [
                'total' => $logs->total(),
                'page' => $logs->currentPage(),
                'per_page' => $logs->perPage(),
                'last_page' => $logs->lastPage(),
            ],
        ]);
    }
}
