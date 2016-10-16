<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>theLEAGUE | Login</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-login full-height">

            <span>theLEAGUE</span>

            <form class="form-login" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    <span class="label">Email</span>
                    <span class="label-icon"><i class="fa fa-envelope" ></i></span>
                </div>

                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    <span class="label">Password</span>
                    <span class="label-icon"><i class="fa fa-lock" ></i></span>
                </div>

                <input type="submit" name="submit" value="login" class="btn-login">

                <div class="checkbox">
        			<label>
                        <input type="checkbox" name="remember"><span>Remember me</span>
                    </label>
        		</div>
            </form>
        </div>
    </body>
</html>
