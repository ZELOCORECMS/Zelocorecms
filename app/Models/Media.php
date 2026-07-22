<?php

declare(strict_types=1);

/**
 * @license GPL-2.0-or-later
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasUuids;

    public const UPDATED_AT = null;

    protected $table = 'zc_media';

    protected $guarded = [];

    protected $casts = [
        'metadata' => 'json',
    ];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function getUrl(): string
    {
        return Storage::disk($this->disk)->url($this->storage_path);
    }

    public function getThumbnailUrl(string $size): string
    {
        $pathInfo = pathinfo($this->storage_path);
        $thumbPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_' . $size . '.' . $pathInfo['extension'];
        return Storage::disk($this->disk)->url($thumbPath);
    }
}
