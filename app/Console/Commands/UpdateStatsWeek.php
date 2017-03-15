<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class UpdateStatsWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates all stats for the week';

    protected $week;
    protected $start;
    protected $finish;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->week = '01';
        $this->start = '2017-03-13';
        $this->finish = '2017-03-20';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // teams
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/team/basic/game/teamsummary?cayenneExp=gameDate%3E=%22'.$this->start.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$this->finish.'T11:00:00.000Z%22%20and%20gameTypeId=2&factCayenneExp=gamesPlayed%3E=1');

        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('teams_stats')
            ->join('teams', 'teams_stats.player_id', '=', 'teams.id')
            ->where('teams.nhl', $val['teamAbbrev'])
            ->update([
                'gp_'.$this->week => $val['gamesPlayed'],
                'w_'.$this->week => $val['wins'],
                'l_'.$this->week => $val['losses'],
                'o_'.$this->week => $val['otLosses'],
                'p_'.$this->week => $val['points'],
                'f_'.$this->week => $val['goalsFor'],
                'a_'.$this->week => $val['goalsAgainst']
            ]);
        };

        // skaters
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/game/skatersummary?cayenneExp=gameDate%3E=%22'.$this->start.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$this->finish.'T11:00:00.000Z%22%20and%20gameTypeId=2&factCayenneExp=gamesPlayed%3E=1');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->update([
                'gp_'.$this->week => $val['gamesPlayed'],
                'g_'.$this->week => $val['goals'],
                'a_'.$this->week => $val['assists'],
                'p_'.$this->week => $val['points'],
                's_'.$this->week => $val['shots']
            ]);
        };

        // faceoff wins
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/game/faceoffs?cayenneExp=gameDate%3E=%22'.$this->start.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$this->finish.'T11:00:00.000Z%22%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->update([
                'f_'.$this->week => $val['faceoffsWon']
            ]);
        };

        // hits
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/game/realtime?cayenneExp=gameDate%3E=%22'.$this->start.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$this->finish.'T11:00:00.000Z%22%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('skaters_stats')
            ->join('skaters', 'skaters_stats.player_id', '=', 'skaters.id')
            ->where('skaters.player_name', $val['playerName'])
            ->update([
                'h_'.$this->week => $val['hits']
            ]);
        };

        // goalies
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/goalies/goalie_basic/game/goaliesummary?cayenneExp=gameDate%3E=%22'.$this->start.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$this->finish.'T11:00:00.000Z%22%20and%20gameTypeId=2%20and%20playerPositionCode=%22G%22');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            DB::table('goalies_stats')
            ->join('goalies', 'goalies_stats.player_id', '=', 'goalies.id')
            ->where('goalies.player_name', $val['playerName'])
            ->update([
                'gp_'.$this->week => $val['gamesPlayed'],
                'w_'.$this->week => $val['wins'],
                'l_'.$this->week => $val['losses'],
                'o_'.$this->week => $val['otLosses'],
                'g_'.$this->week => $val['goalsAgainst'],
                's_'.$this->week => $val['saves'],
                'i_'.$this->week => $val['timeOnIce']
            ]);
        };
    }
}