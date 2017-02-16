<div>
    <div>
        @foreach(${$team} as $team)
        <div class="tr">
            <div>
                <span>{{ $team->nhl }}</span>
            </div>

            <div>{{ $team->draft }}</div>
            <div>{{ $team->contract }}</div>
        </div>
        @endforeach
    </div>
</div>
