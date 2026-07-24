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
        Schema::create('zc_webhooks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id');
            $table->string('name', 255)->nullable();
            $table->string('url', 1000);
            $table->json('events')->default('[]');
            $table->string('secret_hash', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_triggered_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_webhooks');
    }
};
