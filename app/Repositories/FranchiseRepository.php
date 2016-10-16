<?php

namespace App\Repositories;

use App\Models\Franchise;
use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;
use DB;

/**
 *
 */

class FranchiseRepository
{
    // franchise informtaion

    public function id($user_id)
    {
        return Franchise::where('user_id', '=', $user_id)
            ->first()->id;
    }

    public function name($user_id)
    {
        return Franchise::where('user_id', '=', $user_id)
            ->first()->franchise_name;
    }

    public function tag($user_id)
    {
        return Franchise::where('user_id', '=', $user_id)
            ->first()->franchise_tag;
    }

    // get players on roster

    public function skater($user_id, $column, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->select(DB::raw("skaters.*, $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'skaters.nhl')
            ->where('skaters.player_status', '=', $column)
            ->groupBy('skaters.player_name')
            ->orderBy('skaters.lineup_status', 'desc')
            ->orderByRaw('case
                when skaters.player_pos LIKE "C" then 1
                when skaters.player_pos LIKE "L" then 2
                when skaters.player_pos LIKE "R" then 3
                else 4 end')
            ->get();
    }

    public function goalie($user_id, $column, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->select(DB::raw("goalies.*, $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'goalies.nhl')
            ->where('goalies.player_status', '=', $column)
            ->groupBy('goalies.player_name')
            ->orderBy('goalies.lineup_status', 'desc')
            ->get();
    }

    public function team($user_id, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Team::where('franchise_id', '=', $user_id)
            ->select(DB::raw("teams.*, $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'teams.nhl')
            ->groupBy('teams.player_name')
            ->orderBy('teams.lineup_status', 'desc')
            ->get();
    }

    public function info()
    {
        return Franchise::orderBy('waiver_order', 'asc')->get();
    }
}
