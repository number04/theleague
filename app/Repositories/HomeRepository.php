<?php

namespace App\Repositories;

use App\Models\Transaction;

/**
 *
 */

class HomeRepository
{
    // recent activity - skaters

    public function recentSkater()
    {
        return Transaction::select(
                'transactions.*',
                'skaters.injury_status',
                'skaters.player_pos'
            )
            ->join('skaters', 'skaters.player_name', '=', 'transactions.player_name')
            ->orderBy('transactions.added_on', 'desc')
            ->limit(14)
            ->get();
    }

    public function recentGoalie()
    {
        return Transaction::select(
                'transactions.*',
                'goalies.injury_status',
                'goalies.player_pos'
            )
            ->join('goalies', 'goalies.player_name', '=', 'transactions.player_name')
            ->join('franchises', 'franchises.id', '=', 'transactions.franchise_id')
            ->orderBy('transactions.added_on', 'desc')
            ->limit(6)
            ->get();
    }
}
