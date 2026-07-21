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
        Schema::create('zc_options', function (Blueprint $table) {
            $table->id();
            $table->uuid('workspace_id')->nullable();
            $table->string('option_key', 191);
            $table->longText('option_value')->nullable();
            $table->boolean('autoload')->default(true);
            $table->unique(['workspace_id', 'option_key']);
            $table->foreign('workspace_id')->references('id')->on('zc_workspaces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_options');
    }
};
