<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function accreditationBadge(): HasOne
    {
        return $this->hasOne(AccreditationBadge::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }


    public function hasRole(array $roleNames): bool
    {
        foreach ($roleNames as $roleName) {
            if ($this->roles()->where('name', $roleName)->exists()) {
                return true;
            }
        }
        return false;
    }




    public function assignRole(array $roleNames): array
    {
        $roles = [];

        foreach ($roleNames as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            if (!$this->roles->contains($role->id)) {
                $this->roles()->attach($role->id);
                $roles[] = $role;
            }
        }

        return $roles;
    }


    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
