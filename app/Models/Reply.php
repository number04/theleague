<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'message_id',
        'reply',
    ];

    public function user() {
        return $this->belongsTo(Message::class);
    }

}
