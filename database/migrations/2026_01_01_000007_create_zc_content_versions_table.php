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
        Schema::create('zc_content_versions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('content_item_id');
            $table->unsignedInteger('version');
            $table->longText('data');
            $table->json('meta')->nullable();
            $table->uuid('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index(['content_item_id', 'version']);
            $table->foreign('content_item_id')->references('id')->on('zc_content_items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_content_versions');
    }
};
