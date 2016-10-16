<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public $timestamps = false;

    protected $fillable = [
        'franchise_id',
        'player_name',
        'add_drop',
        'transaction_type',
    ];

    public function franchise() {
        return $this->belongsTo(Franchise::class);
    }
}
