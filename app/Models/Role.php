<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Role extends Model
{
    use HasUuids;

    public const UPDATED_AT = null;

    protected $table = 'zc_roles';

    protected $guarded = [];

    protected $casts = [
        'permissions' => 'json',
        'is_system' => 'boolean',
    ];

    public function hasPermission(string $permission): bool
    {
        $permissions = $this->permissions ?? [];
        return in_array($permission, $permissions, true) || in_array('*', $permissions, true);
    }
}
