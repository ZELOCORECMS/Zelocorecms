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
        Schema::create('zc_media', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id');
            $table->string('filename', 500);
            $table->string('original_name', 500)->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->bigInteger('size')->unsigned()->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->text('alt_text')->nullable();
            $table->text('caption')->nullable();
            $table->uuid('folder_id')->nullable();
            $table->string('storage_path', 1000);
            $table->string('disk', 20)->default('local');
            $table->json('metadata')->nullable();
            $table->uuid('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_media');
    }
};
