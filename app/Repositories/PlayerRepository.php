<?php

namespace App\Repositories;

use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;
use DB;

/**
 *
 */

class PlayerRepository
{
    public function skater($where, $player_pos, $order, $sort, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Skater::whereRaw($where)
        ->select(DB::raw("
                skaters.*,
                $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'skaters.nhl')
            ->whereIn('player_pos', $player_pos)
            ->groupBy('skaters.player_name')
            ->orderBy($order, $sort)
            ->orderBy('player_last', 'ASC')
            ->paginate(20);
    }

    public function goalie($where, $player_pos, $order, $sort, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Goalie::whereRaw($where)
        ->select(DB::raw("
                goalies.*,
                $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'goalies.nhl')
            ->whereIn('player_pos', $player_pos)
            ->groupBy('goalies.player_name')
            ->orderBy($order, $sort)
            ->orderBy('player_last', 'ASC')
            ->paginate(20);
    }

    // search queries

    public function findSkater($search, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Skater::where('player_name', 'like', '%'.$search.'%')
            ->select(DB::raw("
                skaters.*,
                $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'skaters.nhl')
            ->groupBy('skaters.player_name')
            ->orderBy('player_last', 'ASC')
            ->get();
    }

    public function findGoalie($search, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Goalie::where('player_name', 'like', '%'.$search.'%')
            ->select(DB::raw("
                goalies.*,
                $schedule_query"))
            ->join('schedules', 'schedules.nhl', '=', 'goalies.nhl')
            ->groupBy('goalies.player_name')
            ->orderBy('player_last', 'ASC')
            ->get();
    }
}
