<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'football_match_id',
        'zone',
        'number_of_tickets',
        'total_price',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function footballMatch(): BelongsTo 
    {
        return $this->belongsTo(FootballMatch::class, 'football_match_id');
    }
    
}
