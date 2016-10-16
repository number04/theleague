<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DateTime;

class Skater extends Model
{
    protected $table = 'skaters';

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
        'goals',
        'assists',
        'points',
        'plus_minus',
        'hits',
        'shots',
        'player_status',
        'injury_status',
        'lineup_status',
    ];

    public function getPlayerNameFirstLetterAttribute ()
    {
        return substr($this->player_name, 0, 1);
    }

    public function getPlayerNameEditedAttribute ()
    {
        if ($this->player_name == "Pierre-Alexandre Parenteau") {
            return str_replace("Pierre-Alexandre","P.A.","Pierre-Alexandre Parenteau");
        }

        return $this->player_name;
    }

    public function getPlayerAgeAttribute ()
    {
        $date1 = new DateTime($this->player_dob);
        $date2 = new DateTime(date(DATE_ATOM));
        $interval = $date1->diff($date2);

		return $interval->y;
    }

    public function getFranchiseTagAttribute ()
    {
        if ($this->franchise_id == 1) {
            return str_replace(1,"meow","meow");
        }
        if ($this->franchise_id == 2) {
            return str_replace(2,"capc","capc");
        }
        if ($this->franchise_id == 3) {
            return str_replace(3,"mon","mon");
        }
        if ($this->franchise_id == 4) {
            return str_replace(4,"mk","mk");
        }
        if ($this->franchise_id == 5) {
            return str_replace(5,"brbs","brbs");
        }
        if ($this->franchise_id == 6) {
            return str_replace(6,"ssqu","ssqu");
        }
        if ($this->franchise_id == 7) {
            return str_replace(7,"ab","ab");
        }
        if ($this->franchise_id == 8) {
            return str_replace(8,"dgr","dgr");
        }
    }

    public function franchise() {
        return $this->belongsTo(Franchise::class);
    }
}
