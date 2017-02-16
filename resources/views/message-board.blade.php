@extends('layouts.app')

@section('content')
<div class="container-post">

    <form action="{{ route('message-post') }}" method="post">
        {{ csrf_field() }}

        <br>
        <br>
        <br>
        <br>
        <br>

        <input type="text" name="message_title" maxlength="32" placeholder="* Message Title"/>
        <br>
        <br>

        <textarea name="message" placeholder="* Message Content"></textarea>

        <br>
        <hr>

        <input type="submit" name="message_submit" value="Submit Message"/>
    </form>



    @foreach($messages as $message)
        <div>{{ $message->user_id }}</div>
        <div><a href="{{ route('message', $message) }}">{{ $message->message_title }}</a></div>
        <div>{{{ $message->message}}}</div>
        <div>{{ $message->updated_on }}</div>
    @endforeach

</div>
@endsection
