@extends('layouts.app')

@section('content')
<div class="container-manage">
    <form action="{{ url('franchise/manage/sign') }}" method="post">
        {{ csrf_field() }}

        <span>sign player
            <span>roster: {{ $count_roster }}/29</span>
        </span>

        <div>
            <input type="text" class="search"/>

            <select name="player" class="select" id="sign">
                <option value="none"></option>

                @foreach($free_skater as $skater)
                    <option value="{{ $skater->player_name }}">{{ $skater->player_pos }} {{ $skater->player_name }}</option>
                @endforeach

                @foreach($free_goalie as $goalie)
                    <option value="{{ $goalie->player_name }}">{{ $goalie->player_pos }} {{ $goalie->player_name }}</option>
                @endforeach
			</select>
        </div>

        <input type="submit" name="post" value="Submit" class="button">
    </form>

    <form action="{{ url('franchise/manage/release') }}" method="post">
        {{ csrf_field() }}

        <span>release player
            <span>roster: {{ $count_roster }}/30</span>
        </span>

        <div>
            <input type="text" class="search"/>

            <select name="player" class="select" id="release">
                <option value="none"></option>

                @foreach($roster_skater as $skater)
                    <option value="{{ $skater->player_name }}">{{ $skater->player_pos }} {{ $skater->player_name }}</option>
                @endforeach

                @foreach($roster_goalie as $goalie)
                    <option value="{{ $goalie->player_name }}">{{ $goalie->player_pos }} {{ $goalie->player_name }}</option>
                @endforeach
			</select>
        </div>

        <input type="submit" name="post" value="Submit" class="button">
    </form>

    <form action="{{ url('franchise/manage/show') }}" method="post">
        {{ csrf_field() }}

        <span>call up
            <span>the show: {{ $count_show }}/26</span>
        </span>

        <div>
            <input type="text" class="search"/>

            <select name="player" class="select" id="show">
                <option value="none"></option>

                @foreach($farm_skater as $skater)
                    <option value="{{ $skater->player_name }}">{{ $skater->player_pos }} {{ $skater->player_name }}</option>
                @endforeach

                @foreach($farm_goalie as $goalie)
                    <option value="{{ $goalie->player_name }}">{{ $goalie->player_pos }} {{ $goalie->player_name }}</option>
                @endforeach
			</select>
        </div>

        <input type="submit" name="post" value="Submit" class="button">
    </form>

    <form action="{{ url('franchise/manage/farm') }}" method="post">
        {{ csrf_field() }}

        <span>send down
            <span>the farm: {{ $count_farm }}</span>
        </span>

        <div>
            <input type="text" class="search"/>

            <select name="player" class="select" id="farm">
                <option value="none"></option>

                @foreach($show_skater as $skater)
                    <option value="{{ $skater->player_name }}">{{ $skater->player_pos }} {{ $skater->player_name }}</option>
                @endforeach

                @foreach($show_goalie as $goalie)
                    <option value="{{ $goalie->player_name }}">{{ $goalie->player_pos }} {{ $goalie->player_name }}</option>
                @endforeach
			</select>
        </div>

        <input type="submit" name="post" value="Submit" class="button">
    </form>

    <form action="{{ url('franchise/manage/injured') }}" method="post">
        {{ csrf_field() }}

        <span>injured reserve
            <span>IR: {{ $count_ir }}/2</span>
        </span>

        <div>
            <input type="text" class="search"/>

            <select name="player" class="select" id="ir">
                <option value="none"></option>

                @foreach($injured_skater as $skater)
                    <option value="{{ $skater->player_name }}">{{ $skater->player_pos }} {{ $skater->player_name }}</option>
                @endforeach

                @foreach($injured_goalie as $goalie)
                    <option value="{{ $goalie->player_name }}">{{ $goalie->player_pos }} {{ $goalie->player_name }}</option>
                @endforeach
			</select>
        </div>

        <input type="submit" name="post" value="Submit" class="button">
    </form>

    <form action="{{ url('franchise/manage/activate') }}" method="post">
        {{ csrf_field() }}

        <span>activate player
            <span>roster: {{ $count_roster }}/30</span>
        </span>

        <div>
            <input type="text" class="search"/>

            <select name="player" class="select" id="activate">
                <option value="none"></option>

                @foreach($ir_skater as $skater)
                    <option value="{{ $skater->player_name }}">{{ $skater->player_pos }} {{ $skater->player_name }}</option>
                @endforeach

                @foreach($ir_goalie as $goalie)
                    <option value="{{ $goalie->player_name }}">{{ $goalie->player_pos }} {{ $goalie->player_name }}</option>
                @endforeach
			</select>
        </div>

        <input type="submit" name="post" value="Submit" class="button">
    </form>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/select.js') }}"></script>

<script>

    $(".select").simpleselect();

    $('.options .option').each(function(){

        $(this).attr('data-search-term', $(this).text().toLowerCase());
	});

	$('.search').on('keyup', function(){

		var searchTerm = $(this).val().toLowerCase();

		$('.options .option').each(function(){
			if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {

				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});

    // open search box

    $("#simpleselect_sign").on('click', function() {
		$(this).closest('form > div').find('.search').addClass('active');
	});

    $("#simpleselect_release").on('click', function() {
		$(this).closest('form > div').find('.search').addClass('active');
	});

    $("#simpleselect_show").on('click', function() {
		$(this).closest('form > div').find('.search').addClass('active');
	});

    $("#simpleselect_farm").on('click', function() {
		$(this).closest('form > div').find('.search').addClass('active');
	});

    $("#simpleselect_ir").on('click', function() {
		$(this).closest('form > div').find('.search').addClass('active');
	});

    $("#simpleselect_activate").on('click', function() {
		$(this).closest('form > div').find('.search').addClass('active');
	});

    // prevent select close

    $('.search').on('click', function(e) {
        e.stopPropagation();
    });

</script>
@endsection
