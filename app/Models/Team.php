<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTime;

class Team extends Model
{
    protected $table = 'teams';

    public $timestamps = false;

    protected $fillable = [
        'franchise_id',
        'player_name',
        'player_first',
        'player_last',
        'draft',
        'contract',
        'games_played',
        'winss',
        'losses',
        'overtime_losses',
        'points',
        'goals_for',
        'goals_against',
        'lineup_status',
    ];

    public function getPlayerAgeAttribute ()
    {
        $date1 = new DateTime($this->player_dob);
        $date2 = new DateTime(date(DATE_ATOM));
        $interval = $date1->diff($date2);

		return $interval->y;
    }

    public function franchise() {
        return $this->belongsTo(Franchise::class);
    }
}
