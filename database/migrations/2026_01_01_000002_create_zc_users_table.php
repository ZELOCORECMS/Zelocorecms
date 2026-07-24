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
        Schema::create('zc_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email', 255)->unique();
            $table->string('password_hash', 255)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('avatar_url', 500)->nullable();
            $table->enum('provider', ['local', 'google', 'github', 'saml', 'oidc'])->default('local');
            $table->string('provider_id', 255)->nullable();
            $table->boolean('is_super_admin')->default(false);
            $table->boolean('mfa_enabled')->default(false);
            $table->text('mfa_secret')->nullable()->comment('AES-256 encrypted TOTP secret');
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zc_users');
    }
};
