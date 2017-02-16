<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'message_title',
        'replies',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reply() {
        return $this->hasMany(Reply::class);
    }

    // public function getRouteKeyName() {
    //     return 'message_title';
    // }
}
