<?php

namespace App\Repositories;

use App\Models\Franchise;
use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;

/**
 *
 */

class RosterRepository
{

    // get players on roster

    public function skater($user_id, $position)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->where('skaters.player_pos', '=', $position)
            ->orderBy('player_status', 'DESC')
            ->orderBy('injury_status', 'DESC')
            ->get();
    }

    public function goalie($user_id)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->orderBy('player_status', 'DESC')
            ->orderBy('injury_status', 'DESC')
            ->get();
    }

    public function team($user_id)
    {
        return Team::where('franchise_id', '=', $user_id)
            ->get();
    }
}
