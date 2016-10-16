<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;
use App\Models\Franchise;
use App\Repositories\FranchiseRepository;
use App\Repositories\CountRepository;
use App\Repositories\VariableRepository;

use Redirect;
use Session;

class FranchiseController extends Controller
{
    protected $franchise;
    protected $count;
    protected $variable;

    public function __construct(FranchiseRepository $franchise, CountRepository $count, VariableRepository $variable)
    {
        $this->franchise = $franchise;
        $this->count = $count;
        $this->variable = $variable;
    }

    public function franchise($franchise, Request $request)
    {
        if ($franchise == $request->user()->franchise()->first()->franchise_tag) {
            return Redirect::route('franchise-user');
        }

        // get user_id of franchise page

        $user_id = Franchise::where('franchise_tag', '=', $franchise)->first()->user_id;

        $day_01 = $this->variable->day('day_01');
        $day_02 = $this->variable->day('day_02');
        $day_03 = $this->variable->day('day_03');
        $day_04 = $this->variable->day('day_04');
        $day_05 = $this->variable->day('day_05');
        $day_06 = $this->variable->day('day_06');
        $day_07 = $this->variable->day('day_07');

        $schedule_query = "schedules.$day_01, schedules.$day_02, schedules.$day_03,
            schedules.$day_04, schedules.$day_05, schedules.$day_06, schedules.$day_07,
            sum(
                (schedules.$day_01 <> '') + (schedules.$day_02 <> '') +
                (schedules.$day_03 <> '') + (schedules.$day_04 <> '') +
                (schedules.$day_05 <> '') + (schedules.$day_06 <> '') +
                (schedules.$day_07 <> '')
            ) AS game_count";

        return view('franchise', [

            'franchise_id' => $this->franchise->id($user_id),
            'franchise_name' => $this->franchise->name($user_id),
            'franchise_tag' => $this->franchise->tag($user_id),

            'count_ir_skater' => $this->count->irSkater($user_id),
            'count_ir_goalie' => $this->count->irGoalie($user_id),
            'count_farm_skater' => $this->count->farmSkater($user_id),
            'count_farm_goalie' => $this->count->farmGoalie($user_id),

            'show_skater' => $this->franchise->skater(
                $user_id, 'show', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'show_goalie' => $this->franchise->goalie(
                $user_id, 'show', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'farm_skater' => $this->franchise->skater(
                $user_id, 'farm', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'farm_goalie' => $this->franchise->goalie(
                $user_id, 'farm', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'team' => $this->franchise->team(
                $user_id, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'ir_skater' => $this->franchise->skater(
                $user_id, 'ir', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'ir_goalie' => $this->franchise->goalie(
                $user_id, 'ir', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            'day_01' => $day_01,
            'day_02' => $day_02,
            'day_03' => $day_03,
            'day_04' => $day_04,
            'day_05' => $day_05,
            'day_06' => $day_06,
            'day_07' => $day_07,
            'week' => $this->variable->week(),
            'week_number' => $this->variable->weekNumber(),
        ]);
    }

    public function franchiseUser(Request $request)
    {
        $user_id = $request->user()->id;

        $day_01 = $this->variable->day('day_01');
        $day_02 = $this->variable->day('day_02');
        $day_03 = $this->variable->day('day_03');
        $day_04 = $this->variable->day('day_04');
        $day_05 = $this->variable->day('day_05');
        $day_06 = $this->variable->day('day_06');
        $day_07 = $this->variable->day('day_07');

        $schedule_query = "schedules.$day_01, schedules.$day_02, schedules.$day_03,
            schedules.$day_04, schedules.$day_05, schedules.$day_06, schedules.$day_07,
            sum(
                (schedules.$day_01 <> '') + (schedules.$day_02 <> '') +
                (schedules.$day_03 <> '') + (schedules.$day_04 <> '') +
                (schedules.$day_05 <> '') + (schedules.$day_06 <> '') +
                (schedules.$day_07 <> '')
            ) AS game_count";

        return view('franchise-user', [

            'franchise_id' => $this->franchise->id($user_id),
            'franchise_name' => $this->franchise->name($user_id),
            'franchise_tag' => $this->franchise->tag($user_id),

            'count_ir_skater' => $this->count->irSkater($user_id),
            'count_ir_goalie' => $this->count->irGoalie($user_id),
            'count_farm_skater' => $this->count->farmSkater($user_id),
            'count_farm_goalie' => $this->count->farmGoalie($user_id),

            'show_skater' => $this->franchise->skater(
                $user_id, 'show', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'show_goalie' => $this->franchise->goalie(
                $user_id, 'show', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'farm_skater' => $this->franchise->skater(
                $user_id, 'farm', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'farm_goalie' => $this->franchise->goalie(
                $user_id, 'farm', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'team' => $this->franchise->team(
                $user_id, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'ir_skater' => $this->franchise->skater(
                $user_id, 'ir', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),
            'ir_goalie' => $this->franchise->goalie(
                $user_id, 'ir', $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07
            ),

            'day_01' => $day_01,
            'day_02' => $day_02,
            'day_03' => $day_03,
            'day_04' => $day_04,
            'day_05' => $day_05,
            'day_06' => $day_06,
            'day_07' => $day_07,
            'week' => $this->variable->week(),
            'week_number' => $this->variable->weekNumber(),
        ]);
    }

    public function franchisePost(Request $request)
    {
        $user_id = $request->user()->id;

        if ($this->count->irCheck($user_id) > 0) {
            Session::flash('fail', 'Ineligible player on IR.');
            return Redirect::route('franchise-user');
        }

        if (($this->count->fullRoster($user_id) - $this->count->farmSkater($user_id) + $this->count->farmGoalie($user_id)) > 25) {
            Session::flash('fail', 'The Show limit exceeded.');
            return Redirect::route('franchise-user');
        }

        if (
            count($request->C) > 5 ||
            count($request->R) > 5 ||
            count($request->L) > 5 ||
            count($request->D) > 5 ||
            count($request->G) > 2 ||
            count($request->t) > 2 ||

            count($request->C) === 5 && (
                count($request->R) > 4 ||
                count($request->L) > 4 ||
                count($request->D) > 4 ||
                count($request->G) > 2 ||
                count($request->T) > 2
            ) ||
            count($request->R) === 5 && (
                count($request->C) > 4 ||
                count($request->L) > 4 ||
                count($request->D) > 4 ||
                count($request->G) > 2 ||
                count($request->T) > 2
            ) ||
            count($request->L) === 5 && (
                count($request->C) > 4 ||
                count($request->R) > 4 ||
                count($request->D) > 4 ||
                count($request->G) > 2 ||
                count($request->T) > 2
            )
        ) {
            Session::flash('fail', 'Position limit exceeded.');
            return Redirect::route('franchise-user');
        }

        Skater::where('franchise_id', '=', $user_id)
            ->where('player_status', '=', 'show')
            ->update(['lineup_status' => 'b'.$user_id]);

        Goalie::where('franchise_id', '=', $user_id)
            ->where('player_status', '=', 'show')
            ->update(['lineup_status' => 'b'.$user_id]);

        Team::where('franchise_id', '=', $user_id)
            ->update(['lineup_status' => 'b'.$user_id]);

        $lineup = array_merge(
            (array)$request->C,
            (array)$request->R,
            (array)$request->L,
            (array)$request->D,
            (array)$request->G,
            (array)$request->T
        );

        $dress = array_values($lineup);

        Skater::whereIn('player_name', $dress)
            ->update(['lineup_status' => 'd'.$user_id]);

        Goalie::whereIn('player_name', $dress)
            ->update(['lineup_status' => 'd'.$user_id]);

        Team::whereIn('player_name', $dress)
            ->update(['lineup_status' => 'd'.$user_id]);

        Session::flash('success', 'Lineup set for following week.');
        return Redirect::route('franchise-user');
    }
}
