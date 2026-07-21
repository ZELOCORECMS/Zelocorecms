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
        Schema::create('zc_audit_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('workspace_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('action', 200);
            $table->string('resource_type', 100)->nullable();
            $table->uuid('resource_id')->nullable();
            $table->longText('old_value')->nullable()->comment('JSON');
            $table->longText('new_value')->nullable()->comment('JSON');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index(['workspace_id', 'action']);
            $table->index('resource_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_audit_logs');
    }
};
