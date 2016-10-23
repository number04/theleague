<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\RosterRepository;
use App\Repositories\FranchiseRepository;

class RosterController extends Controller
{
    protected $roster;
    protected $franchise;

    public function __construct(RosterRepository $roster, FranchiseRepository $franchise)
    {
        $this->roster = $roster;
        $this->franchise = $franchise;
    }

    public function roster(Request $request)
    {
        return view('roster', [
            'center_1' => $this->roster->skater(1, 'C'),
            'left_1' => $this->roster->skater(1, 'L'),
            'right_1' => $this->roster->skater(1, 'R'),
            'defence_1' => $this->roster->skater(1, 'D'),
            'goalie_1' => $this->roster->goalie(1),
            'team_1' => $this->roster->team(1),

            'center_2' => $this->roster->skater(2, 'C'),
            'left_2' => $this->roster->skater(2, 'L'),
            'right_2' => $this->roster->skater(2, 'R'),
            'defence_2' => $this->roster->skater(2, 'D'),
            'goalie_2' => $this->roster->goalie(2),
            'team_2' => $this->roster->team(2),

            'center_3' => $this->roster->skater(3, 'C'),
            'left_3' => $this->roster->skater(3, 'L'),
            'right_3' => $this->roster->skater(3, 'R'),
            'defence_3' => $this->roster->skater(3, 'D'),
            'goalie_3' => $this->roster->goalie(3),
            'team_3' => $this->roster->team(3),

            'center_4' => $this->roster->skater(4, 'C'),
            'left_4' => $this->roster->skater(4, 'L'),
            'right_4' => $this->roster->skater(4, 'R'),
            'defence_4' => $this->roster->skater(4, 'D'),
            'goalie_4' => $this->roster->goalie(4),
            'team_4' => $this->roster->team(4),

            'center_5' => $this->roster->skater(5, 'C'),
            'left_5' => $this->roster->skater(5, 'L'),
            'right_5' => $this->roster->skater(5, 'R'),
            'defence_5' => $this->roster->skater(5, 'D'),
            'goalie_5' => $this->roster->goalie(5),
            'team_5' => $this->roster->team(5),

            'center_6' => $this->roster->skater(6, 'C'),
            'left_6' => $this->roster->skater(6, 'L'),
            'right_6' => $this->roster->skater(6, 'R'),
            'defence_6' => $this->roster->skater(6, 'D'),
            'goalie_6' => $this->roster->goalie(6),
            'team_6' => $this->roster->team(6),

            'center_7' => $this->roster->skater(7, 'C'),
            'left_7' => $this->roster->skater(7, 'L'),
            'right_7' => $this->roster->skater(7, 'R'),
            'defence_7' => $this->roster->skater(7, 'D'),
            'goalie_7' => $this->roster->goalie(7),
            'team_7' => $this->roster->team(7),

            'center_8' => $this->roster->skater(8, 'C'),
            'left_8' => $this->roster->skater(8, 'L'),
            'right_8' => $this->roster->skater(8, 'R'),
            'defence_8' => $this->roster->skater(8, 'D'),
            'goalie_8' => $this->roster->goalie(8),
            'team_8' => $this->roster->team(8),        
        ]);
    }
}
