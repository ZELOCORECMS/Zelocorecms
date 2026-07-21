<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'zc_options';

    protected $guarded = [];

    protected $casts = [
        'autoload' => 'boolean',
    ];

    public $timestamps = false;

    public static function get(string $key, mixed $default = null, ?string $workspaceId = null): mixed
    {
        $query = self::where('option_key', $key);
        if ($workspaceId) {
            $query->where('workspace_id', $workspaceId);
        } else {
            $query->whereNull('workspace_id');
        }

        $option = $query->first();

        return $option ? $option->option_value : $default;
    }

    public static function set(string $key, mixed $value, ?string $workspaceId = null): void
    {
        self::updateOrCreate(
            [
                'option_key' => $key,
                'workspace_id' => $workspaceId,
            ],
            [
                'option_value' => $value,
                'autoload' => true,
            ]
        );
    }
}
