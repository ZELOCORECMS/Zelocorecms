<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContentType extends Model
{
    use HasUuids;

    public const UPDATED_AT = null;

    protected $table = 'zc_content_types';

    protected $guarded = [];

    protected $casts = [
        'schema' => 'json',
        'settings' => 'json',
        'is_system' => 'boolean',
    ];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function contentItems(): HasMany
    {
        return $this->hasMany(ContentItem::class);
    }

    public function getFieldDefinitions(): array
    {
        return $this->schema ?? [];
    }
}
