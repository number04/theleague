@extends('layouts.app')

@section('content')
<div class="container">
    <?php

    function skaterQuery()
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/skaters/basic/season/skatersummary?cayenneExp=gameTypeId=%222%22%20and%20seasonId%3E=20172018%20and%20seasonId%3C=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE skaters SET ');
            print('nhl = "'.$val['playerTeamsPlayedFor'].'"');
            print(' WHERE skaters.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };
    }

    function goalieQuery()
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/goalies/goalie_basic/season/goaliesummary?cayenneExp=gameTypeId=%222%22%20and%20playerPositionCode=%22G%22%20and%20seasonId%3E=20172018');
        $array = json_decode($json, true);
        $data = $array["data"];

        foreach($data as $val) {

            print('UPDATE goalies SET ');
            print('nhl = "'.$val['playerTeamsPlayedFor'].'"');
            print(' WHERE goalies.player_name = "'.$val['playerName'].'";');
            echo '<br>';
        };
    }

    skaterQuery();
    goalieQuery();

    ?>
</div>
@endsection
