<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    protected $table = 'standings';

    public $timestamps = false;

    protected $fillable = [
        'w_01',
        'w_02',
        'w_03',
        'w_04',
        'w_05',
        'w_06',
        'w_07',
        'w_08',
        'w_09',
        'w_10',
        'w_11',
        'w_12',
        'w_13',
        'w_14',
        'w_15',
        'w_16',
        'w_17',
        'w_18',
        'w_19',
        'w_20',
        'w_21',
        'w_22',
    ];

    public function user() {
        return $this->belongsTo(User::class)->select('id');
    }
}
