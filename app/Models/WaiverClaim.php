<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaiverClaim extends Model
{
    protected $table = 'waivers_claims';

    public $timestamps = false;

    protected $fillable = [
        'franchise_id',
        'player_name',
    ];

    public function franchise() {
        return $this->belongsTo(Franchise::class);
    }
}
