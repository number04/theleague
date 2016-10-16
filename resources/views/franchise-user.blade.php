@extends('layouts.app')

@section('content')
<div class="container-franchise">
    <div>
        <img src="{{ asset('img/logo-'.$franchise_id.'.png') }}">
    </div>

    <div>
        <span class="franchise-{{ $franchise_id }}">{{ $franchise_name }}</span>
    </div>

    <div>
        <form action="{{ route('franchise-user') }}" method="post">
            {{ csrf_field() }}

            <div class="button">
                <input type="submit" class="submit franchise-{{ $franchise_id }}" value="submit lineup">
                <a href="{{ route('franchise-roster') }}" class="franchise-{{ $franchise_id }}">manage roster</a>
                <a href="#" class="franchise-{{ $franchise_id }}">propose trade</a>
                <a href="#" class="franchise-{{ $franchise_id }}">player schedule</a>
                <a href="#" class="franchise-{{ $franchise_id }} active">player stats</a>
            </div>

            <div class="count-replace"></div>

            <div class="count">
                <span></span><span>/21</span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="table">
                <div class="th">
                    <ul>
                        <li>pos</li>
                        <li>players</li>
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

                @foreach($show_skater as $skater)
                <div class="tr">
                    <div>
                        @if($skater->lineup_status == 'b'.$skater->franchise_id)
                            <label>
                                <input type="checkbox" value="{{ $skater->player_name }}" name="{{ $skater->player_pos }}[]">
                                <div class="franchise-{{ $franchise_id }}">
                                    <span class="franchise-{{ $franchise_id }}">{{ $skater->player_pos }}</span>
                                </div>
                            </label>
                        @else
                            <label>
                                <input type="checkbox" value="{{ $skater->player_name }}" name="{{ $skater->player_pos }}[]" checked>
                                <div class="franchise-{{ $franchise_id }}">
                                    <span class="franchise-{{ $franchise_id }}">{{ $skater->player_pos }}</span>
                                </div>
                            </label>
                        @endif
                    </div>
                    <div>
                        <span>{{ $skater->player_name_edited }}</span>
                        <span class="schedule">({{ $skater->game_count }})</span>
                        <span class="icon-{{ $skater->injury_status }}"></span>
                    </div>
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

            <div class="table @if ($count_ir_skater === 0) no-table @endif">
                @foreach($ir_skater as $skater)
                <div class="tr">
                    <div>{{ $skater->player_pos }}</div>
                    <div>
                        <span>{{ $skater->player_name_edited }}</span>
                        <span class="schedule">({{ $skater->game_count }})</span>
                        <span class="icon-{{ $skater->injury_status }}"></span>
                    </div>
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

            <div class="table">
                <div class="th">
                    <ul>
                        <li>pos</li>
                        <li>players</li>
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
                        <li class="stats">sv</li>
                    </ul>
                </div>

                @foreach($show_goalie as $goalie)
                <div class="tr">
                    <div>
                        @if($goalie->lineup_status == 'b'.$goalie->franchise_id)
                            <label>
                                <input type="checkbox" value="{{ $goalie->player_name }}" name="{{ $goalie->player_pos }}[]">
                                <div class="franchise-{{ $franchise_id }}">
                                    <span class="franchise-{{ $franchise_id }}">{{ $goalie->player_pos }}</span>
                                </div>
                            </label>
                        @else
                            <label>
                                <input type="checkbox" value="{{ $goalie->player_name }}" name="{{ $goalie->player_pos }}[]" checked>
                                <div class="franchise-{{ $franchise_id }}">
                                    <span class="franchise-{{ $franchise_id }}">{{ $goalie->player_pos }}</span>
                                </div>
                            </label>
                        @endif
                    </div>
                    <div>
                        <span>{{ $goalie->player_name }}</span>
                        <span class="schedule">({{ $goalie->game_count }})</span>
                        <span class="icon-{{ $goalie->injury_status }}"></span>
                    </div>
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
                            <li class="stats">sv</li>
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

            <div class="table @if ($count_ir_goalie === 0) no-table @endif">
                @foreach($ir_goalie as $goalie)
                <div class="tr">
                    <div>{{ $goalie->player_pos }}</div>
                    <div>
                        <span>{{ $goalie->player_name }}</span>
                        <span class="schedule">({{ $goalie->game_count }})</span>
                        <span class="icon-{{ $goalie->injury_status }}"></span>
                    </div>
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
                            <li class="stats">sv</li>
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

            <div class="table">
                <div class="th">
                    <ul>
                        <li>pos</li>
                        <li>players</li>
                        <li>dft</li>
                        <li>con</li>
                        <li>age</li>
                        <li>NHL</li>
                        <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                        <li class="stats">gp</li>
                        <li class="stats">w</li>
                        <li class="stats">l</li>
                        <li class="stats">otl</li>
                        <li class="stats">pts</li>
                        <li class="stats">gf</li>
                        <li class="stats">ga</li>
                    </ul>
                </div>

                @foreach($team as $team)
                <div class="tr">
                    <div>
                        @if($team->lineup_status == 'b'.$team->franchise_id)
                            <label>
                                <input type="checkbox" value="{{ $team->player_name }}" name="{{ $team->player_pos }}[]">
                                <div class="franchise-{{ $franchise_id }}">
                                    <span class="franchise-{{ $franchise_id }}">{{ $team->player_pos }}</span>
                                </div>
                            </label>
                        @else
                            <label>
                                <input type="checkbox" value="{{ $team->player_name }}" name="{{ $team->player_pos }}[]" checked>
                                <div class="franchise-{{ $franchise_id }}">
                                    <span class="franchise-{{ $franchise_id }}">{{ $team->player_pos }}</span>
                                </div>
                            </label>
                        @endif
                    </div>
                    <div>
                        <span>{{ $team->player_name }}</span>
                        <span class="schedule">({{ $team->game_count }})</span>
                        <span class="icon-{{ $team->injury_status }}"></span>
                    </div>
                    <div>{{ $team->draft }}</div>
                    <div>{{ $team->contract }}</div>
                    <div>{{ $team->player_age }}</div>
                    <div>{{ $team->nhl }}</div>

                    <div>
                        <ul>
                            <li class="schedule">{{ $week }} (week {{ $week_number }})</li>
                            <li class="stats">gp</li>
                            <li class="stats">w</li>
                            <li class="stats">l</li>
                            <li class="stats">otl</li>
                            <li class="stats">pts</li>
                            <li class="stats">gf</li>
                            <li class="stats">ga</li>
                        </ul>
                    </div>

                    <div class="stats">{{ $team->games_played }}</div>
                    <div class="stats">{{ $team->wins }}</div>
                    <div class="stats">{{ $team->losses }}</div>
                    <div class="stats">{{ $team->overtime_losses }}</div>
                    <div class="stats">{{ $team->points }}</div>
                    <div class="stats">{{ $team->goals_for }}</div>
                    <div class="stats">{{ $team->goals_against }}</div>

                    <div class="schedule">{{ $team-> $day_01 }}</div><span class="schedule">|</span>
                    <div class="schedule">{{ $team-> $day_02 }}</div><span class="schedule">|</span>
                    <div class="schedule">{{ $team-> $day_03 }}</div><span class="schedule">|</span>
                    <div class="schedule">{{ $team-> $day_04 }}</div><span class="schedule">|</span>
                    <div class="schedule">{{ $team-> $day_05 }}</div><span class="schedule">|</span>
                    <div class="schedule">{{ $team-> $day_06 }}</div><span class="schedule">|</span>
                    <div class="schedule">{{ $team-> $day_07 }}</div>
                </div>
                @endforeach
            </div>

            <div class="table @if ($count_farm_skater === 0) no-table @endif">
                <div class="th">
                    <ul>
                        <li>pos</li>
                        <li>players</li>
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

                @foreach($farm_skater as $skater)
                <div class="tr">
                    <div>{{ $skater->player_pos }}</div>
                    <div>
                        <span>{{ $skater->player_name_edited }}</span>
                        <span class="schedule">({{ $skater->game_count }})</span>
                        <span class="icon-{{ $skater->injury_status }}"></span>
                    </div>
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

            <div class="table @if ($count_farm_goalie === 0) no-table @endif">
                <div class="th">
                    <ul>
                        <li>pos</li>
                        <li>players</li>
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
                        <li class="stats">sv</li>
                    </ul>
                </div>

                @foreach($farm_goalie as $goalie)
                <div class="tr">
                    <div>{{ $goalie->player_pos }}</div>
                    <div>
                        <span>{{ $goalie->player_name }}</span>
                        <span class="schedule">({{ $goalie->game_count }})</span>
                        <span class="icon-{{ $goalie->injury_status }}"></span>
                    </div>
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
                            <li class="stats">sv</li>
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
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // count checkboxes

    var countChecks = function() {
        	var count_c = $('input[name="C[]"]:checkbox:checked').length
            var count_l = $('input[name="L[]"]:checkbox:checked').length
            var count_r = $('input[name="R[]"]:checkbox:checked').length
            var count_d = $('input[name="D[]"]:checkbox:checked').length
            var count_g = $('input[name="G[]"]:checkbox:checked').length
            var count_t = $('input[name="T[]"]:checkbox:checked').length
            var count_total = $('input:checkbox:checked').length

        	if (count_c > 0 ||
                count_l > 0 ||
                count_r > 0 ||
                count_d > 0 ||
                count_g > 0 ||
                count_t > 0 ||
                count_total > 0
            ) {
        		$(".count > span:nth-child(3)").text('(C' + count_c + ',');
                $(".count > span:nth-child(4)").text('L' + count_l + ',');
                $(".count > span:nth-child(5)").text('R' + count_r + ',');
                $(".count > span:nth-child(6)").text('D' + count_d + ',');
                $(".count > span:nth-child(7)").text('G' + count_g + ',');
                $(".count > span:nth-child(8)").text('T' + count_t + ')');
                $(".count > span:nth-child(1)").text('Dressed: ' + count_total );
        	}
        };

    // disable checkboxes when max reached

    function limitChecks() {

        var check = $('input[name="C[]"]:checkbox:checked').length >= 5;
        $('input[name="C[]"]:checkbox').not(':checked').attr('disabled',check);

        var check = $('input[name="R[]"]:checkbox:checked').length >= 5;
        $('input[name="R[]"]:checkbox').not(':checked').attr('disabled',check);

        var check = $('input[name="L[]"]:checkbox:checked').length >= 5;
        $('input[name="L[]"]:checkbox').not(':checked').attr('disabled',check);

        var check = $('input[name="D[]"]:checkbox:checked').length >= 5;
        $('input[name="D[]"]:checkbox').not(':checked').attr('disabled',check);

        var check = $('input[name="G[]"]:checkbox:checked').length >= 2;
        $('input[name="G[]"]:checkbox').not(':checked').attr('disabled',check);

        var check = $('input[name="T[]"]:checkbox:checked').length >= 2;
        $('input[name="T[]"]:checkbox').not(':checked').attr('disabled',check);
    }

    // change color on flex position selected

    function flexChange() {
        var center = 'input[name="C[]"]:checkbox';
        var right_wing = 'input[name="R[]"]:checkbox';
        var left_wing = 'input[name="L[]"]:checkbox';
        var defence = 'input[name="D[]"]:checkbox';

        if($('input[name="C[]"]:checkbox:checked').length > 3){
            $(center).on('click', function() {
                $(center).removeClass('flex');
                $(this).addClass('flex');
            })
        }
        if($('input[name="C[]"]:checkbox:checked').length <= 3) {
            $(center).on('click', function() {
                $(this).removeClass('flex');
            })
        }

        if($('input[name="R[]"]:checkbox:checked').length > 3){
            $(right_wing).on('click', function() {
                $(right_wing).removeClass('flex');
                $(this).addClass('flex');
            })
        }
        if($('input[name="R[]"]:checkbox:checked').length <= 3) {
            $(right_wing).on('click', function() {
                $(this).removeClass('flex');
            })
        }

        if($('input[name="L[]"]:checkbox:checked').length > 3){
            $(left_wing).on('click', function() {
                $(left_wing).removeClass('flex');
                $(this).addClass('flex');
            })
        }
        if($('input[name="L[]"]:checkbox:checked').length <= 3) {
            $(left_wing).on('click', function() {
                $(this).removeClass('flex');
            })
        }

        if($('input[name="D[]"]:checkbox:checked').length > 3){
            $(defence).on('click', function() {
                $(defence).removeClass('flex');
                $(this).addClass('flex');
            })
        }
        if($('input[name="D[]"]:checkbox:checked').length <= 3) {
            $(defence).on('click', function() {
                $(this).removeClass('flex');
            })
        }
    }

    // change color on flex position on page initiallization

    function flexInitial() {
        var center = 'input[name="C[]"]:checkbox:checked';
        var right_wing = 'input[name="R[]"]:checkbox:checked';
        var left_wing = 'input[name="L[]"]:checkbox:checked';
        var defence = 'input[name="D[]"]:checkbox:checked';

        if($(center).length === 5){
            $('input[name="C[]"]:checkbox:checked').slice(-1).addClass('flex');
        }
        if($(right_wing).length === 5){
            $('input[name="R[]"]:checkbox:checked').slice(-1).addClass('flex');
        }
        if($(left_wing).length === 5){
            $('input[name="L[]"]:checkbox:checked').slice(-1).addClass('flex');
        }
        if($(defence).length === 5){
            $('input[name="D[]"]:checkbox:checked').slice(-1).addClass('flex');
        }
    }

    // fire methods

    countChecks();
    limitChecks();
    flexInitial();
    flexChange();

    $('input:checkbox').click(function() {
      countChecks();
      limitChecks();
      flexChange();
    });

    // player schedule/stats toggle

        $('.button > a:nth-child(4)').click(function(e) {
            $(".stats").removeClass("show");
            $(".stats").addClass("hide");

            $(".schedule").removeClass("hide");
            $(".schedule").addClass("show");

            $(".button > a:nth-child(4)").addClass("active");
            $(".button > a:nth-child(5)").removeClass("active");

           e.preventDefault();
        });

        $('.button > a:nth-child(5)').click(function(e) {
            $(".stats").removeClass("hide");
            $(".stats").addClass("show");

            $(".schedule").removeClass("show");
            $(".schedule").addClass("hide");

            $(".button > a:nth-child(5)").addClass("active");
            $(".button > a:nth-child(4)").removeClass("active");

           e.preventDefault();
        });

        // sticky div

        function stickyCount() {
            var $count = $(".count");
            if ($(window).scrollTop() > ($count.data("top"))) {
                $('.count').addClass('sticky');
                $('.count-replace').css({display: 'block'});
            }
            else {
                $('.count').removeClass('sticky');
                $('.count-replace').css({display: 'none'});
            }
        }

        $(".count").data("top", $(".count").offset().top);
        $(window).scroll(stickyCount);
</script>
@endsection
