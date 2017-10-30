<div class="container-navigation">

    <div class="white "></div>

	<a href="{{ url('/') }}"><img src="{{ asset('img/logo-main.png') }}"></a>

	<input class="checkbox-toggle-nav nav-check" type="checkbox"/>

	<div class="hamburger">
		<div></div>
	</div>

    <div class="top-links">

        <a href="{{ route('standing') }}"><i class="fa fa-bar-chart"></i></a>

        <a href="{{ url('/scoreboard-w05') }}"><i class="icon-scoreboard"></i></a>

        <a href="{{ route('franchise-user') }}"><i class="icon-{{ Auth::user()->id }}"></i></a>
    </div>

	<div class="navigation-pane">
		<div>
		    <p><a href="{{ route('skater', ['type' => 'free-agent', 'position' => 'S']) }}">Players</a></p>
			<p><a href="{{ route('roster') }}">Rosters</a></p>
            <p><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></p>
			<!--<p><a href="#">Draft</a></p>-->
			<!--<p><a href="#">Playoffs</a></p>-->
		</div>

		<span class="team-icons">
			<a href="{{ url('/franchise/meow') }}"><i class="icon-1"></i></a>
			<a href="{{ url('/franchise/capc') }}"><i class="icon-2"></i></a>
			<a href="{{ url('/franchise/mon') }}"><i class="icon-3"></i></a>
			<a href="{{ url('/franchise/mk') }}"><i class="icon-4"></i></a>
			<a href="{{ url('/franchise/ssqu') }}"><i class="icon-5"></i></a>
			<a href="{{ url('/franchise/brbs') }}"><i class="icon-6"></i></a>
			<a href="{{ url('/franchise/ab') }}"><i class="icon-7"></i></a>
			<a href="{{ url('/franchise/dgr') }}"><i class="icon-8"></i></a>
		</span>
	</div>
</div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
