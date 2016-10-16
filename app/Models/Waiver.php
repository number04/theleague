<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waiver extends Model
{
    protected $table = 'waivers';

    public $timestamps = false;

    protected $fillable = [
        'player_name',
    ];
}
