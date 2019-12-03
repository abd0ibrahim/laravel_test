@extends('layouts.app')


@section('content')

    <ul>
        @foreach($posts as $post)

            <li><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></li>

        @endforeach

    </ul>


@endsection