<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function franchise() {
        return $this->hasOne(Franchise::class);
    }

    public function skater() {
        return $this->hasManyThrough(Skater::class, Franchise::class);
    }

    public function goalie() {
        return $this->hasManyThrough(Goalie::class, Franchise::class);
    }

    public function message() {
        return $this->hasMany(Message::class);
    }
}
