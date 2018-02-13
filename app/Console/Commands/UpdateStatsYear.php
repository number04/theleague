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
        $json = file_get_contents('http://www.nhl.com/stats/rest/team?isAggregate=false&reportType=basic&isGame=false&reportName=teamsummary&cayenneExp=gameTypeId=2%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');

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
        $json = file_get_contents('http://www.nhl.com/stats/rest/skaters?isAggregate=false&reportType=basic&isGame=false&reportName=skatersummary&cayenneExp=gameTypeId=2%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->where('skaters.player_dob', $val['playerBirthDate'])
            ->update([
                'games_played' => $val['gamesPlayed'],
                'goals' => $val['goals'],
                'assists' => $val['assists'],
                'points' => $val['points'],
                'shots' => $val['shots']
            ]);
        };

        // faceoff wins
        $json = file_get_contents('http://www.nhl.com/stats/rest/skaters?isAggregate=false&reportType=basic&isGame=false&reportName=faceoffs&cayenneExp=gameTypeId=2%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->where('skaters.player_dob', $val['playerBirthDate'])
            ->update([
                'faceoff_wins' => $val['faceoffsWon']
            ]);
        };

        // hits
        $json = file_get_contents('http://www.nhl.com/stats/rest/skaters?isAggregate=false&reportType=basic&isGame=false&reportName=realtime&cayenneExp=gameTypeId=2%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->where('skaters.player_dob', $val['playerBirthDate'])
            ->update([
                'hits' => $val['hits']
            ]);
        };

        // goalies
        $json = file_get_contents('http://www.nhl.com/stats/rest/goalies?isAggregate=false&reportType=goalie_basic&isGame=false&reportName=goaliesummary&cayenneExp=gameTypeId=2%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('goalies_stats')
            ->join('goalies', 'goalies_stats.player_id', '=', 'goalies.id')
            ->where('goalies.player_name', $val['playerName'])
            ->where('goalies.player_dob', $val['playerBirthDate'])
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
