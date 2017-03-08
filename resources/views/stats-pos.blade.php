@extends('layouts.app')

@section('content')
<div class="container">
    <?php

    function skaterQuery()
    {
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/skaters/basic/season/skatersummary?cayenneExp=seasonId=20162017%20and%20gameTypeId=2');
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
        $json = file_get_contents('http://www.nhl.com/stats/rest/grouped/goalies/goalie_basic/season/goaliesummary?cayenneExp=seasonId=20162017%20and%20gameTypeId=2');
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
