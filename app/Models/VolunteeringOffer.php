<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class VolunteeringOffer extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'position',
        'status',
        'number_of_volunteers',
        'football_match_id',

        
    ];  

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function footballMatch(): BelongsTo
    {
        return $this->belongsTo(FootballMatch::class, 'football_match_id');
    }
}
