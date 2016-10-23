<div>
    @foreach(${$skater} as $skater)
    <div class="tr">
        <span>{{ $skater->player_name_firstletter }}. {{ $skater->player_last }}</span>
        <span>({{ $skater->draft }})</span>
        <span>@if ($skater->rookie === 'y') r @endif</span>
        <span class="icon-{{ $skater->injury_status }}"></span>
    </div>
    @endforeach
</div>
