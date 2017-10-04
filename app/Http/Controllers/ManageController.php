<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Skater;
use App\Models\Goalie;
use App\Models\Team;
use App\Models\Franchise;
use App\Models\Transaction;
use App\Models\Waiver;
use App\Models\WaiverClaim;
use App\Repositories\FranchiseRepository;
use App\Repositories\CountRepository;
use App\Repositories\VariableRepository;

use Redirect;
use Session;

class ManageController extends Controller
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

    public function roster(Request $request)
    {
        $user_id = $request->user()->id;

        $count_ir = $this->count->irSkater($user_id) + $this->count->irGoalie($user_id);
        $count_farm = $this->count->farmSkater($user_id) + $this->count->farmGoalie($user_id);

        return view('franchise-manage', [
            'franchise_id' => $this->franchise->id($user_id),
            'franchise_name' => $this->franchise->name($user_id),
            'franchise_tag' => $this->franchise->tag($user_id),

            'count_ir' => $count_ir,
            'count_farm' => $count_farm,
            'count_show' => $this->count->fullRoster($user_id) - $count_farm,
            'count_roster' => $this->count->fullRoster($user_id),

            'free_skater' => Skater::where('franchise_id', '=', NULL)->get(),
            'free_goalie' => Goalie::where('franchise_id', '=', NULL)->get(),
            'roster_skater' => $request->user()->skater()->get(),
            'roster_goalie' => $request->user()->goalie()->get(),

            'ir_skater' => $request->user()->skater()
                ->where('player_status', '=', 'ir')
                ->get(),
            'ir_goalie' => $request->user()->goalie()
                ->where('player_status', '=', 'ir')
                ->get(),
            'farm_skater' => $request->user()->skater()
                ->where('rookie', '=', 'y')
                ->where('player_status', '=', 'farm')
                ->get(),
            'farm_goalie' => $request->user()->goalie()
                ->where('rookie', '=', 'y')
                ->where('player_status', '=', 'farm')
                ->get(),
            'show_skater' => $request->user()->skater()
                ->where('rookie', '=', 'y')
                ->where('player_status', '=', 'show')
                ->get(),
            'show_goalie' => $request->user()->goalie()
                ->where('rookie', '=', 'y')
                ->where('player_status', '=', 'show')
                ->get(),
            'injured_skater' => $request->user()->skater()
                ->where('injury_status', '=', 'inj')
                ->where('player_status', '!=', 'ir')
                ->get(),
            'injured_goalie' => $request->user()->goalie()
                ->where('injury_status', '=', 'inj')
                ->where('player_status', '!=', 'ir')
                ->get(),
        ]);
    }

    public function sign(Request $request)
    {
        $user_id = $request->user()->id;

        if ($this->count->waiverCheck($request->player) > 0) {

            $claim = new WaiverClaim;
            $claim->franchise_id = $user_id;
            $claim->player_name = $request->player;
            $claim->save();

            Session::flash('warning', 'Created claim for '.$request->player);
            return Redirect::route('franchise-manage');
        }

        if ($this->count->irCheck($user_id) > 0) {
            Session::flash('fail', 'Ineligible player on IR.');
            return Redirect::route('franchise-manage');
        }

        if ($this->count->fullRoster($user_id) >= 30) {
            Session::flash('fail', 'No roster positions available.');
            return Redirect::route('franchise-manage');
        }

        if ($request->player == 'none') {
            Session::flash('fail', 'Please select a player.');
            return Redirect::route('franchise-manage');
        }

        Skater::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'show',
            'franchise_id' =>  $user_id,
            'lineup_status' =>  'b'.$user_id,
            'contract' =>  '1',
        ]);

        Goalie::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'show',
            'franchise_id' =>  $user_id,
            'lineup_status' =>  'b'.$user_id,
            'contract' =>  '1',
        ]);

        Franchise::where('user_id', '=', $user_id)->increment('sign_year');
        Franchise::where('user_id', '=', $user_id)->increment('sign_all');

        $transaction = new Transaction;
        $transaction->franchise_id = $user_id;
        $transaction->player_name = $request->player;
        $transaction->add_drop = 'plus';
        $transaction->save();

        Session::flash('success', $request->player.' added to roster.');
        return Redirect::route('franchise-manage');
    }

    public function release(Request $request)
    {
        $user_id = $request->user()->id;

        if ($request->player == 'none') {
            Session::flash('fail', 'Please select a player.');
            return Redirect::route('franchise-manage');
        }

        Skater::where('player_name', '=', $request->player)->update([
            'player_status'    =>  null,
            'franchise_id' =>  null,
            'lineup_status' =>  null,
            'draft' =>  'fa',
            'contract' =>  '0',
        ]);

        Goalie::where('player_name', '=', $request->player)->update([
            'player_status'    =>  null,
            'franchise_id' =>  null,
            'lineup_status' =>  null,
            'draft' =>  'fa',
            'contract' =>  '0',
        ]);

        Franchise::where('user_id', '=', $user_id)->increment('release_year');
        Franchise::where('user_id', '=', $user_id)->increment('release_all');

        $transaction = new Transaction;
        $transaction->franchise_id = $user_id;
        $transaction->player_name = $request->player;
        $transaction->add_drop = 'minus';
        $transaction->save();

        $waiver = new Waiver;
        $waiver->player_name = $request->player;
        $waiver->save();

        Session::flash('success', $request->player.' released from roster.');
        return Redirect::route('franchise-manage');
    }

    public function show(Request $request)
    {
        $user_id = $request->user()->id;

        if ($this->count->irCheck($user_id) > 0) {
            Session::flash('fail', 'Ineligible player on IR.');
            return Redirect::route('franchise-manage');
        }

        if ($request->player == 'none') {
            Session::flash('fail', 'Please select a player.');
            return Redirect::route('franchise-manage');
        }

        Skater::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'show',
            'lineup_status' =>  'b'.$user_id,
        ]);

        Goalie::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'show',
            'lineup_status' =>  'b'.$user_id,
        ]);

        Session::flash('success', $request->player.' called up.');
        return Redirect::route('franchise-manage');
    }

    public function farm(Request $request)
    {
        $user_id = $request->user()->id;

        if ($this->count->irCheck($user_id) > 0) {
            Session::flash('fail', 'Ineligible player on IR.');
            return Redirect::route('franchise-manage');
        }

        if ($request->player == 'none') {
            Session::flash('fail', 'Please select a player.');
            return Redirect::route('franchise-manage');
        }

        Skater::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'farm',
            'lineup_status' =>  'r'.$user_id,
        ]);

        Goalie::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'farm',
            'lineup_status' =>  'r'.$user_id,
        ]);

        Session::flash('success', $request->player.' sent down.');
        return Redirect::route('franchise-manage');
    }

    public function injured(Request $request)
    {
        $user_id = $request->user()->id;

        if (($this->count->irSkater($user_id) + $this->count->irGoalie($user_id)) >= 3) {
            Session::flash('fail', 'No IR positions available.');
            return Redirect::route('franchise-manage');
        }

        if ($request->player == 'none') {
            Session::flash('fail', 'Please select a player.');
            return Redirect::route('franchise-manage');
        }

        Skater::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'ir',
            'lineup_status'    =>  'i'.$user_id,
        ]);

        Goalie::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'ir',
            'lineup_status'    =>  'i'.$user_id,
        ]);

        Session::flash('success', $request->player.' placed on IR.');
        return Redirect::route('franchise-manage');
    }

    public function activate(Request $request)
    {
        $user_id = $request->user()->id;

        if ($this->count->fullRoster($user_id) >= 30) {
            Session::flash('fail', 'No roster positions available.');
            return Redirect::route('franchise-manage');
        }

        if ($request->player == 'none') {
            Session::flash('fail', 'Please select a player.');
            return Redirect::route('franchise-manage');
        }

        Skater::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'show',
            'lineup_status' =>  'b'.$user_id,
        ]);

        Goalie::where('player_name', '=', $request->player)->update([
            'player_status'    =>  'show',
            'lineup_status' =>  'b'.$user_id,
        ]);

        Session::flash('success', $request->player.' activated from IR.');
        return Redirect::route('franchise-manage');
    }

    public function allRoster(Request $request)
    {
        # code...
    }
}
