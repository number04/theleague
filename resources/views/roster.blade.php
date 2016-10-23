@extends('layouts.app')

@section('content')
<div class="container-roster">

    <div>
        <span>centermen</span>
        @include('layouts._roster-skater', ['skater' => 'center_1',])
        @include('layouts._roster-skater', ['skater' => 'center_2',])
        @include('layouts._roster-skater', ['skater' => 'center_3',])
        @include('layouts._roster-skater', ['skater' => 'center_4',])
        @include('layouts._roster-skater', ['skater' => 'center_5',])
        @include('layouts._roster-skater', ['skater' => 'center_6',])
        @include('layouts._roster-skater', ['skater' => 'center_7',])
        @include('layouts._roster-skater', ['skater' => 'center_8',])
    </div>

    <div>
        <span>left wingers</span>
        @include('layouts._roster-skater', ['skater' => 'left_1',])
        @include('layouts._roster-skater', ['skater' => 'left_2',])
        @include('layouts._roster-skater', ['skater' => 'left_3',])
        @include('layouts._roster-skater', ['skater' => 'left_4',])
        @include('layouts._roster-skater', ['skater' => 'left_5',])
        @include('layouts._roster-skater', ['skater' => 'left_6',])
        @include('layouts._roster-skater', ['skater' => 'left_7',])
        @include('layouts._roster-skater', ['skater' => 'left_8',])
    </div>

    <div>
        <span>right wingers</span>
        @include('layouts._roster-skater', ['skater' => 'right_1',])
        @include('layouts._roster-skater', ['skater' => 'right_2',])
        @include('layouts._roster-skater', ['skater' => 'right_3',])
        @include('layouts._roster-skater', ['skater' => 'right_4',])
        @include('layouts._roster-skater', ['skater' => 'right_5',])
        @include('layouts._roster-skater', ['skater' => 'right_6',])
        @include('layouts._roster-skater', ['skater' => 'right_7',])
        @include('layouts._roster-skater', ['skater' => 'right_8',])
    </div>

    <div>
        <span>defencemen</span>
        @include('layouts._roster-skater', ['skater' => 'defence_1',])
        @include('layouts._roster-skater', ['skater' => 'defence_2',])
        @include('layouts._roster-skater', ['skater' => 'defence_3',])
        @include('layouts._roster-skater', ['skater' => 'defence_4',])
        @include('layouts._roster-skater', ['skater' => 'defence_5',])
        @include('layouts._roster-skater', ['skater' => 'defence_6',])
        @include('layouts._roster-skater', ['skater' => 'defence_7',])
        @include('layouts._roster-skater', ['skater' => 'defence_8',])
    </div>

    <div>
        <span>goalies</span>
        @include('layouts._roster-goalie', ['goalie' => 'goalie_1',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_2',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_3',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_4',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_5',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_6',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_7',])
        @include('layouts._roster-goalie', ['goalie' => 'goalie_8',])
    </div>

    <div>
        <span>teams</span>
        @include('layouts._roster-team', ['team' => 'team_1',])
        @include('layouts._roster-team', ['team' => 'team_2',])
        @include('layouts._roster-team', ['team' => 'team_3',])
        @include('layouts._roster-team', ['team' => 'team_4',])
        @include('layouts._roster-team', ['team' => 'team_5',])
        @include('layouts._roster-team', ['team' => 'team_6',])
        @include('layouts._roster-team', ['team' => 'team_7',])
        @include('layouts._roster-team', ['team' => 'team_8',])
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
