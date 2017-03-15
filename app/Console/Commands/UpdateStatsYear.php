<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class UpdateStatsYear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:year';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates all stats for the year';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // teams
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/team/basic/season/teamsummary?cayenneExp=seasonId=20162017%20and%20gameTypeId=2');

        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('teams_stats')
            ->join('teams', 'teams_stats.player_id', '=', 'teams.id')
            ->where('teams.nhl', $val['teamAbbrev'])
            ->update([
                'games_played' => $val['gamesPlayed'],
                'wins' => $val['wins'],
                'losses' => $val['losses'],
                'overtime_losses' => $val['otLosses'],
                'points' => $val['points'],
                'goals_for' => $val['goalsFor'],
                'goals_against' => $val['goalsAgainst']
            ]);
        };

        // skaters
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/season/skatersummary?cayenneExp=seasonId=20162017%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->update([
                'games_played' => $val['gamesPlayed'],
                'goals' => $val['goals'],
                'assists' => $val['assists'],
                'points' => $val['points'],
                'shots' => $val['shots']
            ]);
        };

        // faceoff wins
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/season/faceoffs?cayenneExp=seasonId=20162017%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->update([
                'faceoff_wins' => $val['faceoffsWon']
            ]);
        };

        // hits
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/season/realtime?cayenneExp=seasonId=20162017%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->update([
                'hits' => $val['hits']
            ]);
        };

        // goalies
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/goalies/goalie_basic/season/goaliesummary?cayenneExp=seasonId=20162017%20and%20gameTypeId=2%20and%20playerPositionCode=%22G%22&');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('goalies_stats')
            ->join('goalies', 'goalies_stats.player_id', '=', 'goalies.id')
            ->where('goalies.player_name', $val['playerName'])
            ->update([
                'games_played' => $val['gamesPlayed'],
                'wins' => $val['wins'],
                'losses' => $val['losses'],
                'overtime_losses' => $val['otLosses'],
                'goals_against_average' => $val['goalsAgainstAverage'],
                'save_percentage' => $val['savePctg'],
                'saves' => $val['saves']
            ]);
        };
    }
}
