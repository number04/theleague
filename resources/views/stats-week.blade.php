@extends('layouts.app')

@section('content')
<div class="container">
    <?php

    $week_number = '02';
    $start_date = '2016-10-17';
    $end_date = '2016-10-24';

    // teams

    function teamQuery($start_date, $end_date, $week_number)
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/team/basic/game/teamsummary?cayenneExp=gameDate%3E=%22'.$start_date.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$end_date.'T11:00:00.000Z%22%20and%20gameTypeId=2&factCayenneExp=gamesPlayed%3E=1');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE teams_stats JOIN teams ON teams_stats.player_id = teams.id SET ');
            print('teams_stats.gp_'.$week_number.' = '.$val['gamesPlayed'].', ');
            print('teams_stats.w_'.$week_number.' = '.$val['wins'].', ');
            print('teams_stats.l_'.$week_number.' = '.$val['losses'].', ');
            print('teams_stats.o_'.$week_number.' = '.$val['otLosses'].', ');
            print('teams_stats.p_'.$week_number.' = '.$val['points'].', ');
            print('teams_stats.f_'.$week_number.' = '.$val['goalsFor'].', ');
            print('teams_stats.a_'.$week_number.' = '.$val['goalsAgainst']);
            print(' WHERE teams.nhl = "'.$val['teamAbbrev'].'";');
            echo '<br>';
        };
    }

    function skaterQuery($start_date, $end_date, $week_number)
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/game/skatersummary?cayenneExp=gameDate%3E=%22'.$start_date.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$end_date.'T11:00:00.000Z%22%20and%20gameTypeId=2&factCayenneExp=gamesPlayed%3E=1');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters_stats JOIN skaters ON skaters_stats.player_id = skaters.id SET ');
            print('skaters_stats.gp_'.$week_number.' = '.$val['gamesPlayed'].', ');
            print('skaters_stats.g_'.$week_number.' = '.$val['goals'].', ');
            print('skaters_stats.a_'.$week_number.' = '.$val['assists'].', ');
            print('skaters_stats.p_'.$week_number.' = '.$val['points'].', ');
            print('skaters_stats.s_'.$week_number.' = '.$val['shots']);
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };

        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/game/faceoffs?cayenneExp=gameDate%3E=%22'.$start_date.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$end_date.'T11:00:00.000Z%22%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters_stats JOIN skaters ON skaters_stats.player_id = skaters.id SET ');
            print('skaters_stats.f_'.$week_number.' = '.$val['faceoffsWon']);
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';

        };

        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/skaters/basic/game/realtime?cayenneExp=gameDate%3E=%22'.$start_date.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$end_date.'T11:00:00.000Z%22%20and%20gameTypeId=2');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters_stats JOIN skaters ON skaters_stats.player_id = skaters.id SET ');
            print('skaters_stats.h_'.$week_number.' = '.$val['hits']);
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };
    }

    function goalieQuery($start_date, $end_date, $week_number)
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/individual/goalies/goalie_basic/game/goaliesummary?cayenneExp=gameDate%3E=%22'.$start_date.'T11:00:00.000Z%22%20and%20gameDate%3C=%22'.$end_date.'T11:00:00.000Z%22%20and%20gameTypeId=2%20and%20playerPositionCode=%22G%22');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE goalies_stats JOIN goalies ON goalies_stats.player_id = goalies.id SET ');
            print('goalies_stats.gp_'.$week_number.' = '.$val['gamesPlayed'].', ');
            print('goalies_stats.w_'.$week_number.' = '.$val['wins'].', ');
            print('goalies_stats.l_'.$week_number.' = '.$val['losses'].', ');
            print('goalies_stats.o_'.$week_number.' = '.$val['otLosses'].', ');
            print('goalies_stats.g_'.$week_number.' = '.$val['goalsAgainst'].', ');
            print('goalies_stats.s_'.$week_number.' = '.$val['saves'].', ');
            print('goalies_stats.i_'.$week_number.' = '.$val['timeOnIce']);
            print(' WHERE goalies.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };
    }

    teamQuery($start_date, $end_date, $week_number);
    skaterQuery($start_date, $end_date, $week_number);
    goalieQuery($start_date, $end_date, $week_number);

    ?>
</div>
@endsection
