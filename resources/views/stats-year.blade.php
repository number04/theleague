@extends('layouts.app')

@section('content')
<div class="container">
    <?php

    // teams

    function teamQuery()
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/team/basic/season/teamsummary?cayenneExp=gameTypeId=2%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE teams SET ');
            print('games_played = '.$val['gamesPlayed'].', ');
            print('wins = '.$val['wins'].', ');
            print('losses = '.$val['losses'].', ');
            print('overtime_losses = '.$val['otLosses'].', ');
            print('points = '.$val['points'].', ');
            print('goals_for = '.$val['goalsFor'].', ');
            print('goals_against = '.$val['goalsAgainst']);
            print(' WHERE teams.nhl = "'.$val['teamAbbrev'].'";');
            echo '<br>';
        };
    }

    function skaterQuery()
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/skaters/basic/season/skatersummary?cayenneExp=gameTypeId=%222%22%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters SET ');
            print('games_played = '.$val['gamesPlayed'].', ');
            print('goals = '.$val['goals'].', ');
            print('assists = '.$val['assists'].', ');
            print('points = '.$val['points'].', ');
            print('shots = '.$val['shots']);
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };

        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/skaters/basic/season/faceoffs?cayenneExp=gameTypeId=%222%22%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters SET ');
            print('faceoff_wins = '.$val['faceoffsWon']);
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';

        };

        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/skaters/basic/season/realtime?cayenneExp=gameTypeId=%222%22%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters SET ');
            print('hits = '.$val['hits']);
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };
    }

    function goalieQuery()
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/goalies/goalie_basic/season/goaliesummary?cayenneExp=gameTypeId=%222%22%20and%20playerPositionCode=%22G%22%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE goalies SET ');
            print('games_played = '.$val['gamesPlayed'].', ');
            print('wins = '.$val['wins'].', ');
            print('losses = '.$val['losses'].', ');
            print('overtime_losses = '.$val['otLosses'].', ');
            print('goals_against_average = '.$val['goalsAgainstAverage'].', ');
            print('save_percentage = '.$val['savePctg'].', ');
            print('saves = '.$val['saves']);
            print(' WHERE goalies.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };
    }

    teamQuery();
    skaterQuery();
    goalieQuery();

    ?>
</div>
@endsection
