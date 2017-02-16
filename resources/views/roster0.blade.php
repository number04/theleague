@extends('layouts.app')

@section('content')
<div class="container-roster0">

    <div>
        <div>
            <ul>
                <li><i class="icon-{{$user_id}}"></i></li>
            </ul>
        </div>

        <span>needed: C,R,D</span>
        <span>player dft con</span>

        <span>c</span>
        @include('layouts._roster-skater', ['skater' => 'center_user',])

        <span>lw</span>
        @include('layouts._roster-skater', ['skater' => 'left_user',])

        <span>rw</span>
        @include('layouts._roster-skater', ['skater' => 'right_user',])

        <span>d</span>
        @include('layouts._roster-skater', ['skater' => 'defence_user',])

        <span>g</span>
        @include('layouts._roster-goalie', ['goalie' => 'goalie_user',])

        <span>t</span>
        @include('layouts._roster-team', ['team' => 'team_user',])
    </div>

    <div>
        <div>
            <ul>
                <li @if ($user_id === 1) class="no-show" @endif><a href="#tab1"><i class="icon-1"></i></a></li>

                <li @if ($user_id === 2) class="no-show" @endif><a href="#tab2"><i class="icon-2"></i></a></li>

                <li @if ($user_id === 3) class="no-show" @endif><a href="#tab3"><i class="icon-3"></i></a></li>

                <li @if ($user_id === 4) class="no-show" @endif><a href="#tab4"><i class="icon-4"></i></a></li>

                <li @if ($user_id === 5) class="no-show" @endif><a href="#tab5"><i class="icon-5"></i></a></li>

                <li @if ($user_id === 6) class="no-show" @endif><a href="#tab6"><i class="icon-6"></i></a></li>

                <li @if ($user_id === 7) class="no-show" @endif><a href="#tab7"><i class="icon-7"></i></a></li>

                <li @if ($user_id === 8) class="no-show" @endif><a href="#tab8"><i class="icon-8"></i></a></li>
            </ul>
        </div>

        <span>needed: C,R,D</span>
        <span>player dft con</span>

        <span>c</span>
        @include('layouts._roster-skater', ['skater' => 'center_1',])

        <span>lw</span>
        @include('layouts._roster-skater', ['skater' => 'left_1',])

        <span>rw</span>
        @include('layouts._roster-skater', ['skater' => 'right_1',])

        <span>d</span>
        @include('layouts._roster-skater', ['skater' => 'defence_1',])

        <span>g</span>
        @include('layouts._roster-goalie', ['goalie' => 'goalie_1',])

        <span>t</span>
        @include('layouts._roster-team', ['team' => 'team_1',])
    </div>


    {{-- <div>
        <span>left wingers</span>

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

        @include('layouts._roster-team', ['team' => 'team_2',])
        @include('layouts._roster-team', ['team' => 'team_3',])
        @include('layouts._roster-team', ['team' => 'team_4',])
        @include('layouts._roster-team', ['team' => 'team_5',])
        @include('layouts._roster-team', ['team' => 'team_6',])
        @include('layouts._roster-team', ['team' => 'team_7',])
        @include('layouts._roster-team', ['team' => 'team_8',])
    </div> --}}
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
