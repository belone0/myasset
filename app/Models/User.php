<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function crypto(): HasMany
    {
        return $this->hasMany(Asset::class)->where('type','crypto');
    }
    public function acoes(): HasMany
    {
        return $this->hasMany(Asset::class)->where('type','acao');
    }
    public function fiis(): HasMany
    {
        return $this->hasMany(Asset::class)->where('type','fii');
    }
    public function stocks(): HasMany
    {
        return $this->hasMany(Asset::class)->where('type','stock');
    }

}
