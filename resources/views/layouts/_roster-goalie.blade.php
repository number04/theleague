<div>
    <div>
        @foreach(${$goalie} as $goalie)
        <div class="tr">
            <div>
                <span>{{ $goalie->player_name_firstletter }}. {{ $goalie->player_last }}</span>
                <span class="icon-{{ $goalie->injury_status }}"></span>
            </div>

            <div>{{ $goalie->draft }}</div>
            <div>{{ $goalie->contract }}</div>
        </div>
        @endforeach
    </div>
</div>
