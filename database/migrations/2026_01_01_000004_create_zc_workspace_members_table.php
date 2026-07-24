<?php

declare(strict_types=1);

/**
 * ZELOCORECMS
 *
 * @license GPL-3.0-or-later
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zc_workspace_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id');
            $table->uuid('user_id');
            $table->uuid('role_id')->nullable();
            $table->uuid('invited_by')->nullable();
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['workspace_id', 'user_id']);
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('zc_users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('zc_roles')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_workspace_members');
    }
};
