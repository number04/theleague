@extends('layouts.app')

@section('content')
<div class="container-post">

    @foreach($posts as $post)
        <div>{{ $post->user_id }}</div>
        <div><a href="{{ route('reply', $post) }}">{{ $post->title }}</a></div>
        <div>{{ $post->replies }}</div>
    @endforeach

</div>
@endsection
