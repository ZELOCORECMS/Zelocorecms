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
        Schema::create('zc_content_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id');
            $table->uuid('content_type_id');
            $table->string('content_type_slug', 100)->index();
            $table->string('slug', 500)->nullable();
            $table->enum('status', ['draft', 'published', 'scheduled', 'archived', 'trash'])->default('draft')->index();
            $table->longText('data')->comment('JSON field values');
            $table->json('meta')->nullable()->comment('SEO, OG, custom meta');
            $table->unsignedInteger('version')->default(1);
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamp('scheduled_at')->nullable();
            $table->softDeletes();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
            $table->index(['workspace_id', 'content_type_id']);
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->onDelete('cascade');
            $table->foreign('content_type_id')->references('id')->on('zc_content_types');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_content_items');
    }
};
