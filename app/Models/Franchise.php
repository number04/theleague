<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'franchises';

    public $timestamps = false;

    protected $fillable = [
        'team_name',
        'team_tag',
        'huddy_all',
        'huddy_year',
        'gretzky_all',
        'gretzky_year',
        'trade_year',
        'trade_all',
        'sign_year',
        'sign_all',
        'release_year',
        'release_all',
        'waiver_order',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function skater() {
        return $this->hasMany(Skater::class);
    }

    public function goalie() {
        return $this->hasMany(Goalie::class);
    }

    public function getRouteKeyName() {
        return 'franchise_tag';
    }

}
