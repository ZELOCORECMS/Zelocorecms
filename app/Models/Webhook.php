<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Webhook extends Model
{
    use HasUuids;

    protected $table = 'zc_webhooks';

    protected $guarded = [];

    protected $casts = [
        'events' => 'json',
        'is_active' => 'boolean',
        'last_triggered_at' => 'datetime',
    ];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }
}
