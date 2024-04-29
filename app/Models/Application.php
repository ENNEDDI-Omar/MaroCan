<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'volunteering_offer_id',
        'motivation',
        'age',
        'status'
        

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function volunteeringOffer(): BelongsTo
    {
        return $this->belongsTo(VolunteeringOffer::class, 'volunteering_offer_id');
    }
}

