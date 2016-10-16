<?php

namespace App\Repositories;

use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;
use DB;

/**
 *
 */

class StatRepository
{
    public function skater($status, $user_id, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->select(DB::raw("
                skaters.player_name,
                skaters.player_pos,
                skaters.nhl,
                skaters.injury_status,
                skaters_stats.gp_$week_number as games_played,
                skaters_stats.g_$week_number as goals,
                skaters_stats.a_$week_number as assists,
                skaters_stats.p_$week_number as points,
                skaters_stats.h_$week_number as hits,
                skaters_stats.s_$week_number as shots,
                skaters_stats.f_$week_number as faceoff_wins,
                $schedule_query"))
            ->join('skaters_stats', 'skaters_stats.player_id', '=', 'skaters.id')
            ->join('skaters_lineups', 'skaters_lineups.player_id', '=', 'skaters.id')
            ->join('schedules', 'schedules.nhl', '=', 'skaters.nhl')
            ->where('skaters_lineups.w_'.$week_number, '=', $status.$user_id)
            ->groupBy('skaters.player_name')
            ->orderByRaw('case
                when '.'skaters.player_pos LIKE "C" then 1
                when '.'skaters.player_pos LIKE "L" then 2
                when '.'skaters.player_pos LIKE "R" then 3
                else 4 end')
            ->get();
    }

    public function goalie($status, $user_id, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->select(DB::raw("
                goalies.player_name,
                goalies.player_pos,
                goalies.nhl,
                goalies.injury_status,
                goalies_stats.gp_$week_number as games_played,
                goalies_stats.w_$week_number as wins,
                goalies_stats.l_$week_number as losses,
                goalies_stats.o_$week_number as overtime_losses,
                goalies_stats.g_$week_number / (goalies_stats.i_$week_number / 60) * 60 as goals_against_average,
                goalies_stats.s_$week_number / (goalies_stats.s_$week_number + goalies_stats.g_$week_number) as save_percentage,            
                goalies_stats.s_$week_number as saves,
                $schedule_query"))
            ->join('goalies_stats', 'goalies_stats.player_id', '=', 'goalies.id')
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->join('schedules', 'schedules.nhl', '=', 'goalies.nhl')
            ->where('goalies_lineups.w_'.$week_number, '=', $status.$user_id)
            ->groupBy('goalies.player_name')
            ->get();
    }

    public function team($status, $user_id, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
    {
        return Team::where('franchise_id', '=', $user_id)
            ->select(DB::raw("
                teams.player_name,
                teams.player_pos,
                teams.nhl,
                teams_stats.gp_$week_number as games_played,
                teams_stats.w_$week_number as wins,
                teams_stats.l_$week_number as losses,
                teams_stats.o_$week_number as overtime_losses,
                teams_stats.p_$week_number as points,
                teams_stats.f_$week_number as goals_for,
                teams_stats.a_$week_number as goals_against,
                $schedule_query"))
            ->join('teams_stats', 'teams_stats.player_id', '=', 'teams.id')
            ->join('teams_lineups', 'teams_lineups.player_id', '=', 'teams.id')
            ->join('schedules', 'schedules.nhl', '=', 'teams.nhl')
            ->where('teams_lineups.w_'.$week_number, '=', $status.$user_id)
            ->groupBy('teams.player_name')
            ->get();
    }

    public function sumSkater($user_id, $week_number)
    {
        return Skater::where('franchise_id', '=', $user_id)
            ->select(DB::raw("
                franchise_name,
                franchise_tag,
                sum(skaters_stats.gp_$week_number) as games_played,
                sum(skaters_stats.g_$week_number) as goals,
                sum(skaters_stats.a_$week_number) as assists,
                sum(skaters_stats.p_$week_number) as points,
                sum(skaters_stats.h_$week_number) as hits,
                sum(skaters_stats.s_$week_number) as shots,
                sum(skaters_stats.f_$week_number) as faceoff_wins"))
            ->join('franchises', 'franchises.id', '=', 'skaters.franchise_id')
            ->join('skaters_stats', 'skaters_stats.player_id', '=', 'skaters.id')
            ->join('skaters_lineups', 'skaters_lineups.player_id', '=', 'skaters.id')
            ->where('skaters_lineups.w_'.$week_number.'', '=', 'd'.$user_id.'')
            ->get();
    }

    public function sumGoalie($user_id, $week_number)
    {
        return Goalie::where('franchise_id', '=', $user_id)
            ->select(DB::raw("
                franchise_name,
                franchise_tag,
                sum(goalies_stats.gp_$week_number) as games_played,
                sum(goalies_stats.s_$week_number) as saves,
                sum(goalies_stats.s_$week_number) / (sum(goalies_stats.s_$week_number) + sum(goalies_stats.g_$week_number)) as save_percentage,
                sum(goalies_stats.g_$week_number) / (sum(goalies_stats.i_$week_number) / 60) * 60 as goals_against_average"))
            ->join('franchises', 'franchises.id', '=', 'goalies.franchise_id')
            ->join('goalies_stats', 'goalies_stats.player_id', '=', 'goalies.id')
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->where('goalies_lineups.w_'.$week_number.'', '=', 'd'.$user_id.'')
            ->get();
    }

    public function sumTeam($user_id, $week_number)
    {
        return Team::where('franchise_id', '=', $user_id)
            ->select(DB::raw("
                franchise_name,
                franchise_tag,
                sum(teams_stats.gp_$week_number) as games_played,
                sum(teams_stats.p_$week_number) as points"))
            ->join('franchises', 'franchises.id', '=', 'teams.franchise_id')
            ->join('teams_stats', 'teams_stats.player_id', '=', 'teams.id')
            ->join('teams_lineups', 'teams_lineups.player_id', '=', 'teams.id')
            ->where('teams_lineups.w_'.$week_number.'', '=', 'd'.$user_id.'')
            ->get();
    }

    public function topSkater($table, $name, $week_number)
    {
        return Skater::select(DB::raw("
                sum(skaters_stats.".$table."_".$week_number.") as $name"))
            ->join('skaters_stats', 'skaters_stats.player_id', '=', 'skaters.id')
            ->join('skaters_lineups', 'skaters_lineups.player_id', '=', 'skaters.id')
            ->groupBy('skaters_lineups.w_'.$week_number)
            ->whereIn('skaters_lineups.w_'.$week_number.'', ['d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8'])
            ->orderBy($name, 'DESC')
            ->first()->$name;
    }

    public function topSaves($week_number)
    {
        return Goalie::select(DB::raw("
                sum(goalies_stats.s_$week_number) as saves"))
            ->join('goalies_stats', 'goalies_stats.player_id', '=', 'goalies.id')
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->groupBy('goalies_lineups.w_'.$week_number)
            ->whereIn('goalies_lineups.w_'.$week_number.'', ['d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8'])
            ->orderBy('saves', 'DESC')
            ->first()->saves;
    }

    public function topSVP($week_number)
    {
        return Goalie::select(DB::raw("
                sum(goalies_stats.s_$week_number) / (sum(goalies_stats.s_$week_number) + sum(goalies_stats.g_$week_number)) as save_percentage"))
            ->join('goalies_stats', 'goalies_stats.player_id', '=', 'goalies.id')
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->groupBy('goalies_lineups.w_'.$week_number)
            ->whereIn('goalies_lineups.w_'.$week_number.'', ['d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8'])
            ->orderBy('save_percentage', 'DESC')
            ->first()->save_percentage;
    }

    public function topGAA($week_number)
    {
        return Goalie::select(DB::raw("
                sum(goalies_stats.g_$week_number) / (sum(goalies_stats.i_$week_number) / 60) as goals_against_average"))
            ->join('goalies_stats', 'goalies_stats.player_id', '=', 'goalies.id')
            ->join('goalies_lineups', 'goalies_lineups.player_id', '=', 'goalies.id')
            ->groupBy('goalies_lineups.w_'.$week_number)
            ->whereIn('goalies_lineups.w_'.$week_number.'', ['d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8'])
            ->orderBy('goals_against_average', 'ASC')
            ->first()->goals_against_average;
    }

    public function topTeam($week_number)
    {
        return Team::select(DB::raw("
                sum(teams_stats.p_$week_number) as points"))
            ->join('teams_stats', 'teams_stats.player_id', '=', 'teams.id')
            ->join('teams_lineups', 'teams_lineups.player_id', '=', 'teams.id')
            ->groupBy('teams_lineups.w_'.$week_number)
            ->whereIn('teams_lineups.w_'.$week_number.'', ['d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8'])
            ->orderBy('points', 'DESC')
            ->first()->points;
    }
}
