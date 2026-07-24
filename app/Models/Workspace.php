<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workspace extends Model
{
    use HasUuids;

    protected $table = 'zc_workspaces';

    protected $guarded = [];

    protected $casts = [
        'settings' => 'json',
    ];

    public function contentTypes(): HasMany
    {
        return $this->hasMany(ContentType::class);
    }

    public function contentItems(): HasMany
    {
        return $this->hasMany(ContentItem::class);
    }

    public function workspaceMembers(): HasMany
    {
        return $this->hasMany(WorkspaceMember::class);
    }

    public function plugins(): HasMany
    {
        return $this->hasMany(Plugin::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function getSettingMethod(string $key, mixed $default = null): mixed
    {
        $settings = $this->settings ?? [];

        return $settings[$key] ?? $default;
    }
}
