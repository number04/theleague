<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\FranchiseRepository;
use App\Repositories\CountRepository;
use App\Repositories\VariableRepository;
use App\Repositories\StatRepository;

class PlayoffController extends Controller
{
    protected $franchise;
    protected $count;
    protected $variable;
    protected $stat;

    public function __construct(
        FranchiseRepository $franchise,
        CountRepository $count,
        VariableRepository $variable,
        StatRepository $stat
        )
    {
        $this->franchise = $franchise;
        $this->count = $count;
        $this->variable = $variable;
        $this->stat = $stat;
    }

    public function scoreboard($week_number, Request $request)
    {
        $week = $this->variable->scoreboardWeek($week_number);
        $last_week_number = $this->variable->weekNumber($week_number) - 1;

        $day_01 = $this->variable->scoreboardDay($week_number,'01');
        $day_02 = $this->variable->scoreboardDay($week_number,'02');
        $day_03 = $this->variable->scoreboardDay($week_number,'03');
        $day_04 = $this->variable->scoreboardDay($week_number,'04');
        $day_05 = $this->variable->scoreboardDay($week_number,'05');
        $day_06 = $this->variable->scoreboardDay($week_number,'06');
        $day_07 = $this->variable->scoreboardDay($week_number,'07');

        $schedule_query = "schedules.$day_01, schedules.$day_02, schedules.$day_03,
            schedules.$day_04, schedules.$day_05, schedules.$day_06, schedules.$day_07,
            sum(
                (schedules.$day_01 <> '') + (schedules.$day_02 <> '') +
                (schedules.$day_03 <> '') + (schedules.$day_04 <> '') +
                (schedules.$day_05 <> '') + (schedules.$day_06 <> '') +
                (schedules.$day_07 <> '')
            ) AS game_count";

        return view('playoff', [

            'sum_d1_skater' => $this->stat->sumSkaterTwoWeek(1, $week_number, $last_week_number),
            'sum_d1_goalie' => $this->stat->sumGoalieTwoWeek(1, $week_number, $last_week_number),
            'sum_d1_team' => $this->stat->sumTeamTwoWeek(1, $week_number, $last_week_number),
            'sum_d2_skater' => $this->stat->sumSkaterTwoWeek(2, $week_number, $last_week_number),
            'sum_d2_goalie' => $this->stat->sumGoalieTwoWeek(2, $week_number, $last_week_number),
            'sum_d2_team' => $this->stat->sumTeamTwoWeek(2, $week_number, $last_week_number),
            'sum_d3_skater' => $this->stat->sumSkaterTwoWeek(3, $week_number, $last_week_number),
            'sum_d3_goalie' => $this->stat->sumGoalieTwoWeek(3, $week_number, $last_week_number),
            'sum_d3_team' => $this->stat->sumTeamTwoWeek(3, $week_number, $last_week_number),
            'sum_d4_skater' => $this->stat->sumSkaterTwoWeek(4, $week_number, $last_week_number),
            'sum_d4_goalie' => $this->stat->sumGoalieTwoWeek(4, $week_number, $last_week_number),
            'sum_d4_team' => $this->stat->sumTeamTwoWeek(4, $week_number, $last_week_number),
            'sum_d5_skater' => $this->stat->sumSkaterTwoWeek(5, $week_number, $last_week_number),
            'sum_d5_goalie' => $this->stat->sumGoalieTwoWeek(5, $week_number, $last_week_number),
            'sum_d5_team' => $this->stat->sumTeamTwoWeek(5, $week_number, $last_week_number),
            'sum_d6_skater' => $this->stat->sumSkaterTwoWeek(6, $week_number, $last_week_number),
            'sum_d6_goalie' => $this->stat->sumGoalieTwoWeek(6, $week_number, $last_week_number),
            'sum_d6_team' => $this->stat->sumTeamTwoWeek(6, $week_number, $last_week_number),
            'sum_d7_skater' => $this->stat->sumSkaterTwoWeek(7, $week_number, $last_week_number),
            'sum_d7_goalie' => $this->stat->sumGoalieTwoWeek(7, $week_number, $last_week_number),
            'sum_d7_team' => $this->stat->sumTeamTwoWeek(7, $week_number, $last_week_number),
            'sum_d8_skater' => $this->stat->sumSkaterTwoWeek(8, $week_number, $last_week_number),
            'sum_d8_goalie' => $this->stat->sumGoalieTwoWeek(8, $week_number, $last_week_number),
            'sum_d8_team' => $this->stat->sumTeamTwoWeek(8, $week_number, $last_week_number),

            // franchise 1

            'count_b1_skater' => $this->count->benchSkater(1, $week_number),
            'count_b1_goalie' => $this->count->benchGoalie(1, $week_number),
            'count_b1_team' => $this->count->benchTeam(1, $week_number),
            'count_r1_skater' => $this->count->benchFarmSkater(1, $week_number),
            'count_r1_goalie' => $this->count->benchFarmGoalie(1, $week_number),

            'd1_skater' => $this->stat->skater(
                'd', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b1_skater' => $this->stat->skater(
                'b', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r1_skater' => $this->stat->skater(
                 'r', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd1_goalie' => $this->stat->goalie(
                 'd', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b1_goalie' => $this->stat->goalie(
                 'b', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r1_goalie' => $this->stat->goalie(
                 'r', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd1_team' => $this->stat->team(
                 'd', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b1_team' => $this->stat->team(
                 'b', 1, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 2

            'count_b2_skater' => $this->count->benchSkater(2, $week_number),
            'count_b2_goalie' => $this->count->benchGoalie(2, $week_number),
            'count_b2_team' => $this->count->benchTeam(2, $week_number),
            'count_r2_skater' => $this->count->benchFarmSkater(2, $week_number),
            'count_r2_goalie' => $this->count->benchFarmGoalie(2, $week_number),

            'd2_skater' => $this->stat->skater(
                'd', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b2_skater' => $this->stat->skater(
                'b', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r2_skater' => $this->stat->skater(
                 'r', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd2_goalie' => $this->stat->goalie(
                 'd', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b2_goalie' => $this->stat->goalie(
                 'b', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r2_goalie' => $this->stat->goalie(
                 'r', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd2_team' => $this->stat->team(
                 'd', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b2_team' => $this->stat->team(
                 'b', 2, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 3

            'count_b3_skater' => $this->count->benchSkater(3, $week_number),
            'count_b3_goalie' => $this->count->benchGoalie(3, $week_number),
            'count_b3_team' => $this->count->benchTeam(3, $week_number),
            'count_r3_skater' => $this->count->benchFarmSkater(3, $week_number),
            'count_r3_goalie' => $this->count->benchFarmGoalie(3, $week_number),

            'd3_skater' => $this->stat->skater(
                'd', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b3_skater' => $this->stat->skater(
                'b', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r3_skater' => $this->stat->skater(
                 'r', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd3_goalie' => $this->stat->goalie(
                 'd', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b3_goalie' => $this->stat->goalie(
                 'b', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r3_goalie' => $this->stat->goalie(
                 'r', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd3_team' => $this->stat->team(
                 'd', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b3_team' => $this->stat->team(
                 'b', 3, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 4

            'count_b4_skater' => $this->count->benchSkater(4, $week_number),
            'count_b4_goalie' => $this->count->benchGoalie(4, $week_number),
            'count_b4_team' => $this->count->benchTeam(4, $week_number),
            'count_r4_skater' => $this->count->benchFarmSkater(4, $week_number),
            'count_r4_goalie' => $this->count->benchFarmGoalie(4, $week_number),

            'd4_skater' => $this->stat->skater(
                'd', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b4_skater' => $this->stat->skater(
                'b', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r4_skater' => $this->stat->skater(
                 'r', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd4_goalie' => $this->stat->goalie(
                 'd', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b4_goalie' => $this->stat->goalie(
                 'b', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r4_goalie' => $this->stat->goalie(
                 'r', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd4_team' => $this->stat->team(
                 'd', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b4_team' => $this->stat->team(
                 'b', 4, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 5

            'count_b5_skater' => $this->count->benchSkater(5, $week_number),
            'count_b5_goalie' => $this->count->benchGoalie(5, $week_number),
            'count_b5_team' => $this->count->benchTeam(5, $week_number),
            'count_r5_skater' => $this->count->benchFarmSkater(5, $week_number),
            'count_r5_goalie' => $this->count->benchFarmGoalie(5, $week_number),

            'd5_skater' => $this->stat->skater(
                'd', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b5_skater' => $this->stat->skater(
                'b', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r5_skater' => $this->stat->skater(
                 'r', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd5_goalie' => $this->stat->goalie(
                 'd', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b5_goalie' => $this->stat->goalie(
                 'b', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r5_goalie' => $this->stat->goalie(
                 'r', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd5_team' => $this->stat->team(
                 'd', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b5_team' => $this->stat->team(
                 'b', 5, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 6

            'count_b6_skater' => $this->count->benchSkater(6, $week_number),
            'count_b6_goalie' => $this->count->benchGoalie(6, $week_number),
            'count_b6_team' => $this->count->benchTeam(6, $week_number),
            'count_r6_skater' => $this->count->benchFarmSkater(6, $week_number),
            'count_r6_goalie' => $this->count->benchFarmGoalie(6, $week_number),

            'd6_skater' => $this->stat->skater(
                'd', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b6_skater' => $this->stat->skater(
                'b', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r6_skater' => $this->stat->skater(
                 'r', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd6_goalie' => $this->stat->goalie(
                 'd', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b6_goalie' => $this->stat->goalie(
                 'b', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r6_goalie' => $this->stat->goalie(
                 'r', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd6_team' => $this->stat->team(
                 'd', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b6_team' => $this->stat->team(
                 'b', 6, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 7

            'count_b7_skater' => $this->count->benchSkater(7, $week_number),
            'count_b7_goalie' => $this->count->benchGoalie(7, $week_number),
            'count_b7_team' => $this->count->benchTeam(7, $week_number),
            'count_r7_skater' => $this->count->benchFarmSkater(7, $week_number),
            'count_r7_goalie' => $this->count->benchFarmGoalie(7, $week_number),

            'd7_skater' => $this->stat->skater(
                'd', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b7_skater' => $this->stat->skater(
                'b', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r7_skater' => $this->stat->skater(
                 'r', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd7_goalie' => $this->stat->goalie(
                 'd', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b7_goalie' => $this->stat->goalie(
                 'b', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r7_goalie' => $this->stat->goalie(
                 'r', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd7_team' => $this->stat->team(
                 'd', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b7_team' => $this->stat->team(
                 'b', 7, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            // franchise 8

            'count_b8_skater' => $this->count->benchSkater(8, $week_number),
            'count_b8_goalie' => $this->count->benchGoalie(8, $week_number),
            'count_b8_team' => $this->count->benchTeam(8, $week_number),
            'count_r8_skater' => $this->count->benchFarmSkater(8, $week_number),
            'count_r8_goalie' => $this->count->benchFarmGoalie(8, $week_number),

            'd8_skater' => $this->stat->skater(
                'd', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b8_skater' => $this->stat->skater(
                'b', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r8_skater' => $this->stat->skater(
                 'r', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd8_goalie' => $this->stat->goalie(
                 'd', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b8_goalie' => $this->stat->goalie(
                 'b', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'r8_goalie' => $this->stat->goalie(
                 'r', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'd8_team' => $this->stat->team(
                 'd', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'b8_team' => $this->stat->team(
                 'b', 8, $week_number, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            'day_01' => $day_01,
            'day_02' => $day_02,
            'day_03' => $day_03,
            'day_04' => $day_04,
            'day_05' => $day_05,
            'day_06' => $day_06,
            'day_07' => $day_07,
            'week' => $week,
            'week_number' => $week_number,
        ]);
    }
}
