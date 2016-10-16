<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>theLEAGUE | @yield('title')</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/fonts.css" rel="stylesheet">

        @yield('styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>

    <body>
        <div class="container-all">

            @if(Session::has('success'))
                <span class="alert alert-success">
                    <span>{{ Session::get('success') }}</span>
                    <button>x</button>
                </span>
            @endif

            @if(Session::has('fail'))
                <span class="alert alert-fail">
                    <span>{{ Session::get('fail') }}</span>
                    <button>x</button>
                </span>
            @endif

            @if(Session::has('warning'))
                <span class="alert alert-warning">
                    <span>{{ Session::get('warning') }}</span>
                    <button>x</button>
                </span>
            @endif

            @include('layouts._nav')

            @yield('content')

        </div>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>

            // prevent nav from scrolling

            $(':checkbox.nav-check').click(function() {
    				$('.container-all').toggleClass('overflow');
        		});

            // close alert

            $('.alert > button').on('click', function(e) {
                 $('.alert').fadeOut(400, function(){ $(this).remove();});
            });
        </script>

        @yield('scripts')

    </body>
</html>
