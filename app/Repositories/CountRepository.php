<?php

namespace App\Repositories;

use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;
use App\Models\Waiver;
use DB;

/**
 *
 */

class CountRepository
{
    public function irSkater($user_id)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->where('player_status', '=', 'ir')
            ->count();
    }

    public function irGoalie($user_id)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->where('player_status', '=', 'ir')
            ->count();
    }

    public function farmSkater($user_id)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->where('player_status', '=', 'farm')
            ->count();
    }

    public function farmGoalie($user_id)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->where('player_status', '=', 'farm')
            ->count();
    }

    public function fullRoster($user_id)
    {
        $skater = Skater::where('franchise_id', '=', $user_id)
            ->where('player_status', '!=', 'ir')
            ->count();

        $goalie = Goalie::where('franchise_id', '=', $user_id)
            ->where('player_status', '!=', 'ir')
            ->count();

        $team = Team::where('franchise_id', '=', $user_id)
            ->count();

        return $skater + $goalie + $team;
    }

    // bench

    public function benchSkater($user_id, $week_number)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->join('skaters_lineups', 'skaters_lineups.player_id', '=', 'skaters.id')
            ->where('skaters_lineups.w_'.$week_number.'', '=', 'b'.$user_id)
            ->count();
    }

    public function benchGoalie($user_id, $week_number)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->where('goalies_lineups.w_'.$week_number.'', '=', 'b'.$user_id)
            ->count();
    }

    public function benchTeam($user_id, $week_number)
    {
        return Team::where('franchise_id', '=', $user_id)
            ->join('teams_lineups', 'teams_lineups.player_id', '=', 'teams.id')
            ->where('teams_lineups.w_'.$week_number.'', '=', 'b'.$user_id)
            ->count();
    }

    public function benchFarmSkater($user_id, $week_number)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->join('skaters_lineups', 'skaters_lineups.player_id', '=', 'skaters.id')
            ->where('skaters_lineups.w_'.$week_number.'', '=', 'r'.$user_id)
            ->count();
    }

    public function benchFarmGoalie($user_id, $week_number)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->where('goalies_lineups.w_'.$week_number.'', '=', 'r'.$user_id)
            ->count();
    }

    // checks for ineligible players on ir

    public function irCheck($user_id)
    {
        $skater = Skater::where('franchise_id', '=', $user_id)
            ->where('injury_status', '!=', 'inj')
            ->where('player_status', '=', 'ir')
            ->count();

        $goalie = Goalie::where('franchise_id', '=', $user_id)
            ->where('injury_status', '!=', 'inj')
            ->where('player_status', '=', 'ir')
            ->count();

        return $skater + $goalie;
    }

    // checks for players on waivers

    public function waiverCheck($player_name)
    {
        return Waiver::where('player_name', '=', $player_name)
            ->where('added_on', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 2 DAY)'))
            ->count();
    }
}
