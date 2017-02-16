@extends('layouts.app')

@section('content')
<div class="container-reply">


    <form action="{{ route('reply-post', $message_id) }}" method="post">
        {{ csrf_field() }}

        <br>
        <br>
        <br>
        <br>
        <br>


        <textarea name="reply" placeholder="* Message Content"></textarea>

        <br>
        <hr>

        <input type="submit" name="reply_submit" value="Submit Message"/>
    </form>

    @foreach($messages as $message)
        <div>{{ $message->user_id }}</div>
        <div>{{ $message->message_title }}</div>
        <div>{!! $message->message !!}</div>
        <div>{{ $message->updated_on }}</div>
    @endforeach

    <br>
    <br>
    <br>
    <br>

    @foreach($replies as $reply)
        <div>{{ $reply->user_id }}</div>
        <div>{!! $reply->reply !!}</div>
        <div>{{ $reply->posted_on }}</div>
    @endforeach

</div>
@endsection
