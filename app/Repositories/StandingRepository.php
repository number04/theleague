<?php

namespace App\Repositories;

use App\Models\Standing;
use DB;

/**
 *
 */

class StandingRepository
{
    public function rank($franchise_id)
    {
        $ranks =  DB::select('SELECT rank FROM
            (SELECT franchise_id, value, (@i := @i + 1) as rank FROM
            (SELECT
                sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22)
                as value, franchise_id FROM standings GROUP BY franchise_id) t
            CROSS JOIN
            (SELECT @i := 0) x
            ORDER BY value DESC) r WHERE franchise_id = '.$franchise_id.'');

        foreach ($ranks as $rank) {
            return $rank->rank;
        }
    }

    public function pointsBack($franchise_id)
    {
        $top = DB::select('SELECT (
            SELECT
                sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) AS top FROM standings GROUP BY franchise_id ORDER BY top DESC LIMIT 1)
            AS top
            FROM standings
            WHERE franchise_id = '.$franchise_id.' LIMIT 1');

        $last_value = DB::select('SELECT (
            SELECT
                sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22)) AS last_value
                FROM standings
                WHERE franchise_id = '.$franchise_id);

            return $top[0]->top - $last_value[0]->last_value;
    }


    public function total($franchise_id)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->first()->total;
    }

    public function skater($franchise_id)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->whereIn('stat', ['g', 'a', 'pts', 'h', 's', 'fow'])
            ->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->first()->total;
    }

    public function goalie($franchise_id)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->whereIn('stat', ['sv', 'svp', 'gaa'])
            ->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->first()->total;
    }

    public function team($franchise_id)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->where('stat', '=', 'tp')->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->first()->total;
    }

    // get top scores

    public function topTotal()
    {
        return Standing::select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->groupBy('franchise_id')
            ->orderBy('total',' DESC')
            ->first()->total;
    }

    public function topSkater()
    {
        return Standing::whereIn('stat', ['g', 'a', 'pts', 'h', 's', 'fow'])
            ->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->groupBy('franchise_id')
            ->orderBy('total',' DESC')
            ->first()->total;
    }

    public function topGoalie()
    {
        return Standing::whereIn('stat', ['sv', 'svp', 'gaa'])
            ->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->groupBy('franchise_id')
            ->orderBy('total',' DESC')
            ->first()->total;
    }

    public function topTeam()
    {
        return Standing::where('stat', '=', 'tp')
            ->select(DB::raw(
                'sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22) as total'))
            ->groupBy('franchise_id')
            ->orderBy('total',' DESC')
            ->first()->total;
    }

    // get individual week results

    public function weekly($franchise_id, $week)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->sum($week);
    }

    public function bestWeekly($franchise_id)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->select(DB::raw(
                'GREATEST(sum(w_01), sum(w_02), sum(w_03), sum(w_04), sum(w_05),
                sum(w_06), sum(w_07), sum(w_08), sum(w_09), sum(w_10),
                sum(w_11), sum(w_12), sum(w_13), sum(w_14), sum(w_15),
                sum(w_16), sum(w_17), sum(w_18), sum(w_19), sum(w_20),
                sum(w_21), sum(w_22)) as best'))
            ->first()->best;
    }

    public function worstWeekly($franchise_id)
    {
        $collection =  Standing::where('franchise_id', '=', $franchise_id)
            ->select(DB::raw(
                'sum(w_01), sum(w_02), sum(w_03), sum(w_04), sum(w_05),
                sum(w_06), sum(w_07), sum(w_08), sum(w_09), sum(w_10),
                sum(w_11), sum(w_12), sum(w_13), sum(w_14), sum(w_15),
                sum(w_16), sum(w_17), sum(w_18), sum(w_19), sum(w_20),
                sum(w_21), sum(w_22)'))
            ->get();

            $array = min($collection->toArray());
            $filtered = array_diff($array, array(null, '0.0'));

        return min($filtered);
    }

    public function averageWeekly($franchise_id)
    {
        return Standing::where('franchise_id', '=', $franchise_id)
            ->select(DB::raw(
                '(sum(w_01) + sum(w_02) + sum(w_03) + sum(w_04) + sum(w_05) +
                sum(w_06) + sum(w_07) + sum(w_08) + sum(w_09) + sum(w_10) +
                sum(w_11) + sum(w_12) + sum(w_13) + sum(w_14) + sum(w_15) +
                sum(w_16) + sum(w_17) + sum(w_18) + sum(w_19) + sum(w_20) +
                sum(w_21) + sum(w_22)) as average'))
            ->first()->average;
    }
}
