<div>
    @foreach(${$goalie} as $goalie)
    <div class="tr">
        <span>{{ $goalie->player_name_firstletter }}. {{ $goalie->player_last }}</span>
        <span>({{ $goalie->draft }})</span>
        <span>@if ($goalie->rookie === 'y') r @endif</span>
        <span class="icon-{{ $goalie->injury_status }}"></span>
    </div>
    @endforeach
</div>
