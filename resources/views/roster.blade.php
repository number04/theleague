@extends('layouts.app')

@section('content')
<div class="container-roster0">

    <div>
        <div>
            <ul>
                <li><i class="icon-{{$user_id}}"></i></li>
            </ul>
        </div>

        <div>
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

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

        <div id="tab1" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

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

        <div id="tab2" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_2',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_2',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_2',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_2',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_2',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_2',])
        </div>

        <div id="tab3" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_3',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_3',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_3',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_3',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_3',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_3',])
        </div>

        <div id="tab4" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_4',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_4',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_4',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_4',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_4',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_4',])
        </div>

        <div id="tab5" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_5',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_5',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_5',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_5',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_5',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_5',])
        </div>

        <div id="tab6" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_6',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_6',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_6',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_6',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_6',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_6',])
        </div>

        <div id="tab7" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_7',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_7',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_7',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_7',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_7',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_7',])
        </div>

        <div id="tab8" class="tab-content">
            {{-- <span>needed: C,R,D</span> --}}
            <span>
                <span>player</span>
                <span>dft</span>
                <span>con</span>
            </span>

            <span>c</span>
            @include('layouts._roster-skater', ['skater' => 'center_8',])

            <span>lw</span>
            @include('layouts._roster-skater', ['skater' => 'left_8',])

            <span>rw</span>
            @include('layouts._roster-skater', ['skater' => 'right_8',])

            <span>d</span>
            @include('layouts._roster-skater', ['skater' => 'defence_8',])

            <span>g</span>
            @include('layouts._roster-goalie', ['goalie' => 'goalie_8',])

            <span>t</span>
            @include('layouts._roster-team', ['team' => 'team_8',])
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    // tabs

    $(document).ready(function() {
        $(".container-roster0 > div:last-child > div:first-child > ul > li > a").click(function(e) {
            $(this).parent().addClass("active");
            $(this).parent().siblings().removeClass("active");

            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();

            e.preventDefault();
        });
    });

</script>
@endsection
