<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Skater;
use App\Models\Goalie;
use App\Repositories\PlayerRepository;
use App\Repositories\VariableRepository;

use Redirect;
use Session;

class PlayerController extends Controller
{
    protected $player;
    protected $variable;

    public function __construct(PlayerRepository $player, VariableRepository $variable)
    {
        $this->player = $player;
        $this->variable = $variable;
    }

    public function skater($type, $position, Request $request)
    {
        if ($type === 'free-agent') {$where = 'franchise_id is NULL';}
        if ($type === 'on-roster') {$where = 'franchise_id is NOT NULL';}
        if ($type === 'all') {$where = '1=1';}

        if ($position === 'S') {
            $skaters = ['C','D','L','R'];
            $player_pos = $skaters;
        } else {
            $player_pos = [$position];
        }

        $week_number = $this->variable->weekNumber();
        $week = $this->variable->week();

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

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 'points';
        }

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else {
            $sort = 'DESC';
        }

        return view('skater', [

            'skaters' => $this->player->skater($where, $player_pos, $order, $sort, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07),
            'sort' => $sort == 'DESC' ? 'ASC' : 'DESC',

            'type' => $type,
            'position' => $position,

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

    public function goalie($type, $position, Request $request)
    {
        if ($type === 'free-agent') {$where = 'franchise_id is NULL';}
        if ($type === 'on-roster') {$where = 'franchise_id is NOT NULL';}
        if ($type === 'all') {$where = '1=1';}

        if ($position === 'C-D-L-R') {
            $skaters = ['C','D','L','R'];
            $player_pos = $skaters;
        } else {
            $player_pos = [$position];
        }

        $week_number = $this->variable->weekNumber();
        $week = $this->variable->week();

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

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 'wins';
        }

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else {
            $sort = 'DESC';
        }

        return view('goalie', [

            'goalies' => $this->player->goalie($where, $player_pos, $order, $sort, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07),
            'sort' => $sort == 'DESC' ? 'ASC' : 'DESC',

            'type' => $type,
            'position' => $position,

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

    public function findSkater(Request $request)
    {
        $week_number = $this->variable->weekNumber();

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

        if (!$_POST['search_skater'] == '') {

            $search = $_POST['search_skater'];

            if (count($this->player->findSkater($search, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)) == 0) {
                Session::flash('empty', 'no skater found');
                return Redirect::back();
            }

            Session::flash('search_skater',
                $this->player->findSkater($search, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
            );
            return Redirect::back();
        }

        Session::flash('empty', 'no skater found');
        return Redirect::back();
    }

    public function findGoalie(Request $request)
    {
        $week_number = $this->variable->weekNumber();

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

        if (!$_POST['search_goalie'] == '') {

            $search = $_POST['search_goalie'];

            if (count($this->player->findGoalie($search, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)) == 0) {
                Session::flash('empty', 'no goalie found');
                return Redirect::back();
            }

            Session::flash('search_goalie',
                $this->player->findGoalie($search, $schedule_query, $day_01, $day_02, $day_03, $day_04, $day_05, $day_06, $day_07)
            );
            return Redirect::back();
        }

        Session::flash('empty', 'no goalie found');
        return Redirect::back();
    }

    public function filter(Request $request)
    {
        if ($_POST['type'] === 'free-agent') {
            if ($_POST['position'] === 's') {
                return Redirect::route('skater', ['type' => 'free-agent', 'position' => 'S']);
            }
            if ($_POST['position'] === 'c') {
                return Redirect::route('skater', ['type' => 'free-agent', 'position' => 'C']);
            }
            if ($_POST['position'] === 'd') {
                return Redirect::route('skater', ['type' => 'free-agent', 'position' => 'D']);
            }
            if ($_POST['position'] === 'l') {
                return Redirect::route('skater', ['type' => 'free-agent', 'position' => 'L']);
            }
            if ($_POST['position'] === 'r') {
                return Redirect::route('skater', ['type' => 'free-agent', 'position' => 'R']);
            }
            if ($_POST['position'] === 'g') {
                return Redirect::route('goalie', ['type' => 'free-agent', 'position' => 'G']);
            }
        }

        if ($_POST['type'] === 'on-roster') {
            if ($_POST['position'] === 's') {
                return Redirect::route('skater', ['type' => 'on-roster', 'position' => 'S']);
            }
            if ($_POST['position'] === 'c') {
                return Redirect::route('skater', ['type' => 'on-roster', 'position' => 'C']);
            }
            if ($_POST['position'] === 'd') {
                return Redirect::route('skater', ['type' => 'on-roster', 'position' => 'D']);
            }
            if ($_POST['position'] === 'l') {
                return Redirect::route('skater', ['type' => 'on-roster', 'position' => 'L']);
            }
            if ($_POST['position'] === 'r') {
                return Redirect::route('skater', ['type' => 'on-roster', 'position' => 'R']);
            }
            if ($_POST['position'] === 'g') {
                return Redirect::route('goalie', ['type' => 'on-roster', 'position' => 'G']);
            }
        }

        if ($_POST['type'] === 'all') {
            if ($_POST['position'] === 's') {
                return Redirect::route('skater', ['type' => 'all', 'position' => 'S']);
            }
            if ($_POST['position'] === 'c') {
                return Redirect::route('skater', ['type' => 'all', 'position' => 'C']);
            }
            if ($_POST['position'] === 'd') {
                return Redirect::route('skater', ['type' => 'all', 'position' => 'D']);
            }
            if ($_POST['position'] === 'l') {
                return Redirect::route('skater', ['type' => 'all', 'position' => 'L']);
            }
            if ($_POST['position'] === 'r') {
                return Redirect::route('skater', ['type' => 'all', 'position' => 'R']);
            }
            if ($_POST['position'] === 'g') {
                return Redirect::route('goalie', ['type' => 'all', 'position' => 'G']);
            }
        }
    }
}
