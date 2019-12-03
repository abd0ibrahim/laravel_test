@extends('layouts.app')


@section('content')

    <ul>

        <h3>{{$post->title}}</h3>
        @foreach($post as $singlePost)

            <li><a href="{{route('posts.show', $singlePost->title)}}">{{$singlePost->title}}</a></li>

        @endforeach

    </ul>


@endsection