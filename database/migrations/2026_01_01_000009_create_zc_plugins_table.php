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
        Schema::create('zc_plugins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id')->nullable();
            $table->string('slug', 200)->unique();
            $table->string('name', 255);
            $table->string('version', 50)->nullable();
            $table->string('author', 255)->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'error'])->default('inactive');
            $table->string('signature_hash', 255)->nullable();
            $table->json('declared_permissions')->nullable();
            $table->text('config')->nullable()->comment('AES-256 encrypted JSON');
            $table->boolean('network_approved')->default(false);
            $table->text('last_error')->nullable();
            $table->timestamp('installed_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_plugins');
    }
};
