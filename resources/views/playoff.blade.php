@extends('layouts.app')

@section('content')
<div class="container-scoreboard">

    <div>
        chart
    </div>

    <div>
        <span>scoreboard | {{ $week }}</span>

        <div>
            <div class="th">
                <ul>
                    <li></li>
                    <li>gp</li>
                    <li>g</li>
                    <li>a</li>
                    <li>pts</li>
                    <li>ht</li>
                    <li>s</li>
                    <li>fow</li>

                    <li>gp</li>
                    <li>sv</li>
                    <li>sv%</li>
                    <li>gaa</li>

                    <li>gp</li>
                    <li>p</li>
                </ul>
            </div>
            <div class="tr">

            @foreach($sum_d1_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d1_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d1_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d1_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d7_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d7_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d7_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d7_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d4_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d4_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d4_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d4_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d3_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d3_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d3_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d3_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d6_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d6_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d6_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d6_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d2_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d2_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d2_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d2_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d8_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d8_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d8_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d8_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>

            <div class="tr">

            @foreach($sum_d5_team as $team)
                <div>{{ $team->franchise_name }}</div>
            @endforeach

            @foreach($sum_d5_skater as $skater)
                <div>{{ $skater->games_played }}</div>
                <div class="@if ($skater->goals === $top_goals) top @endif"><span></span><p>{{ $skater->goals }}</p></div>
                <div class="@if ($skater->assists === $top_assists) top @endif"><span></span><p>{{ $skater->assists }}</p></div>
                <div class="@if ($skater->points === $top_points) top @endif"><span></span><p>{{ $skater->points }}</p></div>
                <div class="@if ($skater->hits === $top_hits) top @endif"><span></span><p>{{ $skater->hits }}</p></div>
                <div class="@if ($skater->shots === $top_shots) top @endif"><span></span><p>{{ $skater->shots }}</p></div>
                <div class="@if ($skater->faceoff_wins === $top_faceoff_wins) top @endif"><span></span><p>{{ $skater->faceoff_wins }}</p></div>
            @endforeach

            @foreach($sum_d5_goalie as $goalie)
                <div>{{ $goalie->games_played }}</div>

                <div class="@if ($goalie->saves === $top_saves) top @endif">
                    <span></span><p>{{ $goalie->saves }}</p>
                </div>

                <div class="@if ($goalie->save_percentage === $top_save_percentage) top @endif">
                    <span></span><p>{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</p>
                </div>

                <div class="@if ($goalie->goals_against_average === $top_goals_against_average) top @endif">
                    <span></span><p>{{ number_format($goalie->goals_against_average, 2) }}</p>
                </div>
            @endforeach

            @foreach($sum_d5_team as $team)
                <div>{{ $team->games_played }}</div>
                <div class="@if ($team->points === $top_team_points) top @endif"><span></span><p>{{ $team->points }}</p></div>
            @endforeach
            </div>
        </div>
    </div>

    <div>
        <ul>
            <li><a href="#tab1"><i class="icon-1"></i></a></li>

            <li><a href="#tab2"><i class="icon-2"></i></a></li>

            <li><a href="#tab3"><i class="icon-3"></i></a></li>

            <li><a href="#tab4"><i class="icon-4"></i></a></li>

            <li><a href="#tab5"><i class="icon-5"></i></a></li>

            <li><a href="#tab6"><i class="icon-6"></i></a></li>

            <li><a href="#tab7"><i class="icon-7"></i></a></li>

            <li><a href="#tab8"><i class="icon-8"></i></a></li>
        </ul>

        <div class="button">
            <a href="#">player schedule</a>
            <a href="#" class="active">player stats</a>
        </div>

        <div id="tab1" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd1_skater',
                'd_goalie' => 'd1_goalie',
                'd_team' => 'd1_team',
                'b_skater' => 'b1_skater',
                'b_goalie' => 'b1_goalie',
                'b_team' => 'b1_team',
                'r_skater' => 'r1_skater',
                'r_goalie' => 'r1_goalie',

                'count_b_skater' => 'count_b1_skater',
                'count_b_goalie' => 'count_b1_goalie',
                'count_r_skater' => 'count_r1_skater',
                'count_r_goalie' => 'count_r1_goalie',
            ])
        </div>

        <div id="tab2" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd2_skater',
                'd_goalie' => 'd2_goalie',
                'd_team' => 'd2_team',
                'b_skater' => 'b2_skater',
                'b_goalie' => 'b2_goalie',
                'b_team' => 'b2_team',
                'r_skater' => 'r2_skater',
                'r_goalie' => 'r2_goalie',

                'count_b_skater' => 'count_b2_skater',
                'count_b_goalie' => 'count_b2_goalie',
                'count_r_skater' => 'count_r2_skater',
                'count_r_goalie' => 'count_r2_goalie',
            ])
        </div>

        <div id="tab3" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd3_skater',
                'd_goalie' => 'd3_goalie',
                'd_team' => 'd3_team',
                'b_skater' => 'b3_skater',
                'b_goalie' => 'b3_goalie',
                'b_team' => 'b3_team',
                'r_skater' => 'r3_skater',
                'r_goalie' => 'r3_goalie',

                'count_b_skater' => 'count_b3_skater',
                'count_b_goalie' => 'count_b3_goalie',
                'count_r_skater' => 'count_r3_skater',
                'count_r_goalie' => 'count_r3_goalie',
            ])
        </div>

        <div id="tab4" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd4_skater',
                'd_goalie' => 'd4_goalie',
                'd_team' => 'd4_team',
                'b_skater' => 'b4_skater',
                'b_goalie' => 'b4_goalie',
                'b_team' => 'b4_team',
                'r_skater' => 'r4_skater',
                'r_goalie' => 'r4_goalie',

                'count_b_skater' => 'count_b4_skater',
                'count_b_goalie' => 'count_b4_goalie',
                'count_r_skater' => 'count_r4_skater',
                'count_r_goalie' => 'count_r4_goalie',
            ])
        </div>

        <div id="tab5" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd5_skater',
                'd_goalie' => 'd5_goalie',
                'd_team' => 'd5_team',
                'b_skater' => 'b5_skater',
                'b_goalie' => 'b5_goalie',
                'b_team' => 'b5_team',
                'r_skater' => 'r5_skater',
                'r_goalie' => 'r5_goalie',

                'count_b_skater' => 'count_b5_skater',
                'count_b_goalie' => 'count_b5_goalie',
                'count_r_skater' => 'count_r5_skater',
                'count_r_goalie' => 'count_r5_goalie',
            ])
        </div>

        <div id="tab6" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd6_skater',
                'd_goalie' => 'd6_goalie',
                'd_team' => 'd6_team',
                'b_skater' => 'b6_skater',
                'b_goalie' => 'b6_goalie',
                'b_team' => 'b6_team',
                'r_skater' => 'r6_skater',
                'r_goalie' => 'r6_goalie',

                'count_b_skater' => 'count_b6_skater',
                'count_b_goalie' => 'count_b6_goalie',
                'count_r_skater' => 'count_r6_skater',
                'count_r_goalie' => 'count_r6_goalie',
            ])
        </div>

        <div id="tab7" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd7_skater',
                'd_goalie' => 'd7_goalie',
                'd_team' => 'd7_team',
                'b_skater' => 'b7_skater',
                'b_goalie' => 'b7_goalie',
                'b_team' => 'b7_team',
                'r_skater' => 'r7_skater',
                'r_goalie' => 'r7_goalie',

                'count_b_skater' => 'count_b7_skater',
                'count_b_goalie' => 'count_b7_goalie',
                'count_r_skater' => 'count_r7_skater',
                'count_r_goalie' => 'count_r7_goalie',
            ])
        </div>

        <div id="tab8" class="tab-content">
            @include('layouts._scoreboard', [
                'd_skater' => 'd8_skater',
                'd_goalie' => 'd8_goalie',
                'd_team' => 'd8_team',
                'b_skater' => 'b8_skater',
                'b_goalie' => 'b8_goalie',
                'b_team' => 'b8_team',
                'r_skater' => 'r8_skater',
                'r_goalie' => 'r8_goalie',

                'count_b_skater' => 'count_b8_skater',
                'count_b_goalie' => 'count_b8_goalie',
                'count_r_skater' => 'count_r8_skater',
                'count_r_goalie' => 'count_r8_goalie',
            ])
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>

    // tabs

    $(document).ready(function() {
        $(".tab-content").css("display", "none");

        $(".container-scoreboard > div:nth-child(3) > ul > li > a").click(function(e) {
            $(this).parent().addClass("active");
            $(this).parent().siblings().removeClass("active");

            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();

            e.preventDefault();
        });
    });

    // player schedule/stats toggle

    $('.button > a:nth-child(1)').click(function(e) {
        $(".stats").removeClass("show");
        $(".stats").addClass("hide");

        $(".schedule").removeClass("hide");
        $(".schedule").addClass("show");

        $(".button > a:nth-child(1)").addClass("active");
        $(".button > a:nth-child(2)").removeClass("active");

       e.preventDefault();
    });

    $('.button > a:nth-child(2)').click(function(e) {
        $(".stats").removeClass("hide");
        $(".stats").addClass("show");

        $(".schedule").removeClass("show");
        $(".schedule").addClass("hide");

        $(".button > a:nth-child(2)").addClass("active");
        $(".button > a:nth-child(1)").removeClass("active");

       e.preventDefault();
    });

</script>
@endsection
