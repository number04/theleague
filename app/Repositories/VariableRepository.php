<?php

namespace App\Repositories;

use App\Models\Variable;
use App\Models\VariableSchedule;

/**
 *
 */

class VariableRepository
{
    public function day($day)
    {
        return Variable::where('variable_name', '=', $day)
            ->first()->variable;
    }

    public function week()
    {
        return Variable::where('variable_name', '=', 'week')
            ->first()->variable;
    }

    public function weekNumber()
    {
        return Variable::where('variable_name', '=', 'week_number')
            ->first()->variable;
    }

    // scoreboard variables

    public function scoreboardDay($week_number, $day)
    {
        return VariableSchedule::where('variable_name', '=', $week_number.'_'.$day)
            ->first()->variable;
    }

    public function scoreboardWeek($week_number)
    {
        return VariableSchedule::where('variable_name', '=', 'week_'.$week_number)
            ->first()->variable;
    }
}
