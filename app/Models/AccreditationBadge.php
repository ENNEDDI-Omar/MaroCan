<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class AccreditationBadge extends Model
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'badge_number',
        'expiration_date',
        'journalist_id',
        'mediaPlatform_id',
    ];

    public function journalist(): BelongsTo
    {
        return $this->belongsTo(Journalist::class);
    }

    public function mediaPlatform(): BelongsTo
    {
        return $this->belongsTo(MediaPlatform::class);
    }
}
