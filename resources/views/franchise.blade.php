@extends('layouts.app')

@section('styles')
<style>
    .container-franchise > div:nth-of-type(3) > form > div:nth-of-type(4) {
        margin-top: -24px;
    }
    .container-franchise > div:nth-child(3) .count {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="container-franchise">

    <div>
        <img src="{{ asset('img/logo-'.$franchise_id.'.png') }}">
    </div>

    <div>
        <span class="franchise-{{ $franchise_id }}">{{ $franchise_name }}</span>
    </div>

    <div>
        <form>
            <div class="button"></div>

            <div class="count-replace"></div>

            <div class="count"></div>

            <div class="table">
                <div class="th">
                    <ul>
                        <li>pos</li>
                        <li>players</li>
                        <li>dft</li>
                        <li>con</li>
                        <li>age</li>
                        <li>NHL</li>
                        <li></li>
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
                            <li></li>
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
                            <li></li>
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
                        <li></li>
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
                            <li></li>
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
                            <li></li>
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
                        <li></li>
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
                    <div>{{ $team->player_pos }}</div>
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
                            <li></li>
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
                        <li></li>
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
                            <li></li>
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
                        <li></li>
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
                            <li></li>
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
                </div>
                @endforeach
            </div>
        </form>
    </div>
</div>
@endsection
