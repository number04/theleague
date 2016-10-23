<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTime;

class Goalie extends Model
{
    protected $table = 'goalies';

    public $timestamps = false;

    protected $fillable = [
        'franchise_id',
        'player_name',
        'player_first',
        'player_last',
        'draft',
        'contract',
        'rookie',
        'player_pos',
        'player_dob',
        'nhl',
        'games_played',
        'winss',
        'losses',
        'overtime_losses',
        'goals_against_average',
        'save_percentage',
        'shutouts',
        'player_status',
        'injury_status',
        'lineup_status',
    ];

    public function getPlayerNameFirstLetterAttribute ()
    {
        return substr($this->player_name, 0, 1);
    }

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
