@extends('layouts.app')

@section('content')
<div class="container-player">

    <div></div>

    <div>
        <span> @if ($type === 'all') all players @elseif ($type != 'all') {{ str_replace('-', ' ', $type) }}s @endif | {{ $position }}</span>

        <form action="{{ url('search-skater') }}" method="post">
            {{ csrf_field() }}
            <br>
            <input type="text" name="search_skater" placeholder="search skater" style="border: 1px solid grey; border-radius: 2px;">
            <input type="submit" value="Search">
        </form>

        <form action="{{ url('search-goalie') }}" method="post">
            {{ csrf_field() }}
            <br>
            <input type="text" name="search_goalie" placeholder="search goalie" style="border: 1px solid grey; border-radius: 2px;">
            <input type="submit" value="Search"><br><br>
        </form>

        <form action="{{ url('filter') }}" method="post">
            {{ csrf_field() }}

            <input type="radio" name="type" value="free-agent"> free agent<br>
            <input type="radio" name="type" value="on-roster"> on-roster<br>
            <input type="radio" name="type" value="all"> all<br><br>
            <input type="radio" name="position" value="s"> skater<br>
            <input type="radio" name="position" value="c"> center<br>
            <input type="radio" name="position" value="l"> left wing<br>
            <input type="radio" name="position" value="r"> right wing<br>
            <input type="radio" name="position" value="d"> defence<br>
            <input type="radio" name="position" value="g"> goalie<br>
            <input type="submit" value="filter">
        </form>
    </div>

    @if (Session::has('empty'))
    <span> {{ Session::get('empty') }} </span>
    @endif

    @if(Session::has('search_skater'))
    <span>
        <?php $search_skater = Session::get('search_skater'); ?>

        <div class="table">
           <div class="th">
               <ul>
                   <li>pos</li>
                   <li>players</li>
                   <li>own</li>
                   <li>dft</li>
                   <li>con</li>
                   <li>age</li>
                   <li>NHL</li>
                   <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                   <li class="stats">gp</li>
                   <li class="stats">g</li>
                   <li class="stats">a</li>
                   <li class="stats">pts</li>
                   <li class="stats">ht</li>
                   <li class="stats">s</li>
                   <li class="stats">fow</li>
               </ul>
           </div>

           @foreach($search_skater as $skater)
           <div class="tr">
               <div>{{ $skater->player_pos }}</div>
               <div>
                   <span>{{ $skater->player_name_edited }}</span>
                   <span class="schedule">({{ $skater->game_count }})</span>
                   <span class="icon-{{ $skater->injury_status }}"></span>
               </div>
               <div>{{ $skater->franchise_tag}}</div>
               <div>{{ $skater->draft }}</div>
               <div>{{ $skater->contract }}</div>
               <div>{{ $skater->player_age }}</div>
               <div>{{ $skater->nhl }}</div>

               <div>
                   <ul>
                       <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                       <li class="stats">gp</li>
                       <li class="stats">g</li>
                       <li class="stats">a</li>
                       <li class="stats">pts</li>
                       <li class="stats">ht</li>
                       <li class="stats">s</li>
                       <li class="stats">fow</li>
                   </ul>
               </div>

               <div class="stats">{{ $skater->games_played }}</div>
               <div class="stats">{{ $skater->goals }}</div>
               <div class="stats">{{ $skater->assists }}</div>
               <div class="stats">{{ $skater->points }}</div>
               <div class="stats">{{ $skater->hits }}</div>
               <div class="stats">{{ $skater->shots }}</div>
               <div class="stats">{{ $skater->faceoff_wins }}</div>

               <div class="schedule">{{ $skater-> $day_01 }}</div><span class="schedule">|</span>
               <div class="schedule">{{ $skater-> $day_02 }}</div><span class="schedule">|</span>
               <div class="schedule">{{ $skater-> $day_03 }}</div><span class="schedule">|</span>
               <div class="schedule">{{ $skater-> $day_04 }}</div><span class="schedule">|</span>
               <div class="schedule">{{ $skater-> $day_05 }}</div><span class="schedule">|</span>
               <div class="schedule">{{ $skater-> $day_06 }}</div><span class="schedule">|</span>
               <div class="schedule">{{ $skater-> $day_07 }}</div>

           </div>
           @endforeach
       </div>
    </span>
    @endif

    @if(Session::has('search_goalie'))
    <span>
        <?php $goalies = Session::get('search_goalie'); ?>

        <div class="table">
            <div class="th">
                <ul>
                    <li>pos</li>
                    <li>players</li>
                    <li>own</li>
                    <li>dft</li>
                    <li>con</li>
                    <li>age</li>
                    <li>NHL</li>
                    <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                    <li class="stats">gp</li>
                    <li class="stats">w</li>
                    <li class="stats">l</li>
                    <li class="stats">otl</li>
                    <li class="stats">gaa</li>
                    <li class="stats">sv%</li>
                    <li class="stats">s</li>
                </ul>
            </div>

            @foreach($goalies as $goalie)
            <div class="tr">
                <div>{{ $goalie->player_pos }}</div>
                <div>
                    <span>{{ $goalie->player_name }}</span>
                     <span class="schedule">({{ $goalie->game_count }})</span>
                    <span class="icon-{{ $goalie->injury_status }}"></span>
                </div>
                <div>{{ $goalie->franchise_tag }}</div>
                <div>{{ $goalie->draft }}</div>
                <div>{{ $goalie->contract }}</div>
                <div>{{ $goalie->player_age }}</div>
                <div>{{ $goalie->nhl }}</div>

                <div>
                    <ul>
                        <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                        <li class="stats">gp</li>
                        <li class="stats">w</li>
                        <li class="stats">l</li>
                        <li class="stats">otl</li>
                        <li class="stats">gaa</li>
                        <li class="stats">sv%</li>
                        <li class="stats">s</li>
                    </ul>
                </div>

                <div class="stats">{{ $goalie->games_played }}</div>
                <div class="stats">{{ $goalie->wins }}</div>
                <div class="stats">{{ $goalie->losses }}</div>
                <div class="stats">{{ $goalie->overtime_losses }}</div>
                <div class="stats">{{ $goalie->goals_against_average }}</div>
                <div class="stats"> {{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</div>
                <div class="stats">{{ $goalie->saves }}</div>

                <div class="schedule">{{ $goalie-> $day_01 }}</div><span class="schedule">|</span>
                <div class="schedule">{{ $goalie-> $day_02 }}</div><span class="schedule">|</span>
                <div class="schedule">{{ $goalie-> $day_03 }}</div><span class="schedule">|</span>
                <div class="schedule">{{ $goalie-> $day_04 }}</div><span class="schedule">|</span>
                <div class="schedule">{{ $goalie-> $day_05 }}</div><span class="schedule">|</span>
                <div class="schedule">{{ $goalie-> $day_06 }}</div><span class="schedule">|</span>
                <div class="schedule">{{ $goalie-> $day_07 }}</div>

            </div>
            @endforeach
        </div>
    </span>
    @endif

    <div class="button">
        <a href="#">player schedule</a>
        <a href="#" class="active">player stats</a>
    </div>

    <div class="table">
       <div class="th">
           <ul>
               <li><a href="?order=player_pos&sort={{ $sort }}">pos</a></li>
               <li><a href="?order=player_last&sort={{ $sort }}">players</a></li>
               <li><a href="?order=franchise_id&sort={{ $sort }}">own</a></li>
               <li><a href="?order=player_last&sort={{ $sort }}">dft</a></li>
               <li><a href="?order=contract&sort={{ $sort }}">con</a></li>
               <li><a href="?order=player_dob&sort={{ $sort }}">age</a></li>
               <li><a href="?order=nhl&sort={{ $sort }}">NHL</a></li>
               <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
               <li class="stats"><a href="?order=games_played&sort={{ $sort }}">gp</a></li>
               <li class="stats"><a href="?order=wins&sort={{ $sort }}">w</a></li>
               <li class="stats"><a href="?order=losses&sort={{ $sort }}">l</a></li>
               <li class="stats"><a href="?order=overtime_losses&sort={{ $sort }}">otl</a></li>
               <li class="stats"><a href="?order=goals_against_average&sort={{ $sort }}">gaa</a></li>
               <li class="stats"><a href="?order=save_percentage&sort={{ $sort }}">sv%</a></li>
               <li class="stats"><a href="?order=saves&sort={{ $sort }}">s</a></li>
           </ul>
       </div>

       @foreach($goalies as $goalie)
       <div class="tr">
           <div>{{ $goalie->player_pos }}</div>
           <div>
               <span>{{ $goalie->player_name }}</span>
               <span class="schedule">({{ $goalie->game_count }})</span>
               <span class="icon-{{ $goalie->injury_status }}"></span>
           </div>
           <div>{{ $goalie->franchise_tag}}</div>
           <div>{{ $goalie->draft }}</div>
           <div>{{ $goalie->contract }}</div>
           <div>{{ $goalie->player_age }}</div>
           <div>{{ $goalie->nhl }}</div>

           <div>
               <ul>
                   <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                   <li class="stats">gp</li>
                   <li class="stats">w</li>
                   <li class="stats">l</li>
                   <li class="stats">otl</li>
                   <li class="stats">gaa</li>
                   <li class="stats">sv%</li>
                   <li class="stats">s</li>
               </ul>
           </div>

           <div class="stats">{{ $goalie->games_played }}</div>
           <div class="stats">{{ $goalie->wins }}</div>
           <div class="stats">{{ $goalie->losses }}</div>
           <div class="stats">{{ $goalie->overtime_losses }}</div>
           <div class="stats">{{ $goalie->goals_against_average }}</div>
           <div class="stats">{{ $goalie->save_percentage }}</div>
           <div class="stats">{{ $goalie->saves }}</div>

           <div class="schedule">{{ $goalie-> $day_01 }}</div><span class="schedule">|</span>
           <div class="schedule">{{ $goalie-> $day_02 }}</div><span class="schedule">|</span>
           <div class="schedule">{{ $goalie-> $day_03 }}</div><span class="schedule">|</span>
           <div class="schedule">{{ $goalie-> $day_04 }}</div><span class="schedule">|</span>
           <div class="schedule">{{ $goalie-> $day_05 }}</div><span class="schedule">|</span>
           <div class="schedule">{{ $goalie-> $day_06 }}</div><span class="schedule">|</span>
           <div class="schedule">{{ $goalie-> $day_07 }}</div>

       </div>
       @endforeach
   </div>
   {{ $goalies->appends(request()->input())->links() }}
</div>
@endsection

@section('scripts')
<script>

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
