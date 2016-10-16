<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variables';

    public $timestamps = false;

    protected $fillable = [
        'variable',
    ];    
}
