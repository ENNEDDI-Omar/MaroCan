<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FootballMatch extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'stadium',
        'city',
        'match_date',
        'number_of_seats',
        'status',
        
        
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

     // Relation avec l'équipe 1
     public function team1(): BelongsTo
     {
         return $this->belongsTo(Team::class, 'team1_id');
     }
 
     // Relation avec l'équipe 2
     public function team2(): BelongsTo
     {
         return $this->belongsTo(Team::class, 'team2_id');
     }

    public function volunteeringOffers(): HasMany
    {
        return $this->hasMany(VolunteeringOffer::class);
    }

    public function referee(): BelongsToMany
    {
        return $this->belongsToMany(Referee::class);
    }


}
