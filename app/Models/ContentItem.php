<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentItem extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = 'zc_content_items';

    protected $guarded = [];

    protected $casts = [
        'data' => 'json',
        'meta' => 'json',
        'published_at' => 'datetime',
        'scheduled_at' => 'datetime',
    ];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function contentType(): BelongsTo
    {
        return $this->belongsTo(ContentType::class);
    }

    public function contentVersions(): HasMany
    {
        return $this->hasMany(ContentVersion::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', 'draft');
    }

    public function scopeByType(Builder $query, string $slug): Builder
    {
        return $query->where('content_type_slug', $slug);
    }
}
