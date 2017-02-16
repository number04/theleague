<div>
    <div>
        @foreach(${$skater} as $skater)
        <div class="tr @if ($skater->rookie === 'y')rookie @endif">
            <div>
                <span>{{ $skater->player_name_firstletter }}. {{ $skater->player_last }}</span>
                <span class="icon-{{ $skater->injury_status }}"></span>
            </div>

            <div>{{ $skater->draft }}</div>
            <div>{{ $skater->contract }}</div>
            {{-- <div>{{ $skater->player_age }}</div>
            <div>{{ $skater->nhl }}</div>
            <div>{{ $skater->games_played }}</div>
            <div>{{ $skater->goals }}</div>
            <div>{{ $skater->assists }}</div>
            <div>{{ $skater->points }}</div>
            <div>{{ $skater->hits }}</div>
            <div>{{ $skater->shots }}</div>
            <div>{{ $skater->faceoff_wins }}</div> --}}
        </div>
        @endforeach
    </div>
</div>
