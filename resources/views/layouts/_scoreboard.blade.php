 <div class="table">
    <div class="th">
        <ul>
            <li>pos</li>
            <li>players</li>
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

    @foreach(${ $d_skater } as $skater)
    <div class="tr">
        <div>{{ $skater->player_pos }}</div>
        <div>
            <span>{{ $skater->player_name_edited }}</span>
            <span class="schedule">({{ $skater->game_count }})</span>
            <span class="icon-{{ $skater->injury_status }}"></span>
        </div>
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

    @foreach(${ $d_goalie } as $goalie)
    <div class="tr">
        <div>{{ $goalie->player_pos }}</div>
        <div>
            <span>{{ $goalie->player_name }}</span>
            <span class="schedule">({{ $goalie->game_count }})</span>
            <span class="icon-{{ $goalie->injury_status }}"></span>
        </div>
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
        <div class="stats">{{ number_format($goalie->goals_against_average, 2) }}</div>
        <div class="stats">{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</div>
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

    @foreach(${ $d_team } as $team)
    <div class="tr">
        <div>{{ $team->player_pos }}</div>
        <div>
            <span>{{ $team->player_name }}</span>
            <span class="schedule">({{ $team->game_count }})</span>
            <span class="icon-{{ $team->injury_status }}"></span>
        </div>
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

<div class="table @if (${ $count_b_skater } === 0) no-table @endif">
    <div class="th">
        <ul>
            <li>pos</li>
            <li>players</li>
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

    @foreach(${ $b_skater } as $skater)
    <div class="tr">
        <div>{{ $skater->player_pos }}</div>
        <div>
            <span>{{ $skater->player_name_edited }}</span>
            <span class="schedule">({{ $skater->game_count }})</span>
            <span class="icon-{{ $skater->injury_status }}"></span>
        </div>
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

<div class="table @if (${ $count_b_goalie } === 0) no-table @endif">
    <div class="th">
        <ul>
            <li>pos</li>
            <li>players</li>
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

    @foreach(${ $b_goalie } as $goalie)
    <div class="tr">
        <div>{{ $goalie->player_pos }}</div>
        <div>
            <span>{{ $goalie->player_name }}</span>
            <span class="schedule">({{ $goalie->game_count }})</span>
            <span class="icon-{{ $goalie->injury_status }}"></span>
        </div>
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
        <div class="stats">{{ number_format($goalie->goals_against_average, 2) }}</div>
        <div class="stats">{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</div>
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

    @foreach(${ $b_team} as $team)
    <div class="tr">
        <div>{{ $team->player_pos }}</div>
        <div>
            <span>{{ $team->player_name }}</span>
            <span class="schedule">({{ $team->game_count }})</span>
            <span class="icon-{{ $team->injury_status }}"></span>
        </div>
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

<div class="table @if (${ $count_r_skater } === 0) no-table @endif">
    <div class="th">
        <ul>
            <li>pos</li>
            <li>players</li>
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

    @foreach(${ $r_skater } as $skater)
    <div class="tr">
        <div>{{ $skater->player_pos }}</div>
        <div>
            <span>{{ $skater->player_name_edited }}</span>
            <span class="schedule">({{ $skater->game_count }})</span>
            <span class="icon-{{ $skater->injury_status }}"></span>
        </div>
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

<div class="table @if (${ $count_r_goalie } === 0) no-table @endif">
    <div class="th">
        <ul>
            <li>pos</li>
            <li>players</li>
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

    @foreach(${ $r_goalie } as $goalie)
    <div class="tr">
        <div>{{ $goalie->player_pos }}</div>
        <div>
            <span>{{ $goalie->player_name }}</span>
            <span class="schedule">({{ $goalie->game_count }})</span>
            <span class="icon-{{ $goalie->injury_status }}"></span>
        </div>
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
        <div class="stats">{{ number_format($goalie->goals_against_average, 2) }}</div>
        <div class="stats">{{ ltrim(number_format($goalie->save_percentage, 3), 0) }}</div>
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
