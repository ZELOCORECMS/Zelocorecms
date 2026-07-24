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
        Schema::create('zc_content_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id');
            $table->string('slug', 100);
            $table->string('name', 255);
            $table->json('schema')->comment('Field definitions JSON');
            $table->json('settings')->nullable();
            $table->boolean('is_system')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['workspace_id', 'slug']);
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_content_types');
    }
};
