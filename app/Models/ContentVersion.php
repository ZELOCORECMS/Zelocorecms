<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentVersion extends Model
{
    use HasUuids;

    public const UPDATED_AT = null;

    protected $table = 'zc_content_versions';

    protected $guarded = [];

    protected $casts = [
        'data' => 'json',
        'meta' => 'json',
    ];

    public function contentItem(): BelongsTo
    {
        return $this->belongsTo(ContentItem::class);
    }
}
