@extends('layouts.app')


@section('content')

    <ul>

        <h3>{{$post->title}}</h3>
        @foreach($posts as $post)

            <li><a href="{{route('posts.show', $posts->id)}}">{{$posts->title}}</a></li>

        @endforeach

    </ul>


@endsection