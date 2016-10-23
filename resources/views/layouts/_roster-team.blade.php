<div>
    @foreach(${$team} as $team)
    <div class="tr">
        <span>{{ $team->nhl }}</span>
        <span>({{ $team->draft }})</span>
    </div>
    @endforeach
</div>
