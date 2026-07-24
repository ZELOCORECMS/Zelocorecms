<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasUuids;

    protected $table = 'zc_plugins';

    protected $guarded = [];

    protected $casts = [
        'declared_permissions' => 'json',
        'config' => 'encrypted',
        'network_approved' => 'boolean',
        'installed_at' => 'datetime',
    ];

    public function getDirectory(): string
    {
        return base_path('plugins/'.$this->slug);
    }

    public function getEntrypoint(): string
    {
        return $this->getDirectory().'/Plugin.php';
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }
}
