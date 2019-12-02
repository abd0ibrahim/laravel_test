@extends('layouts.app')


@section('content')

    <ul xmlns:font-size="http://www.w3.org/1999/xhtml">

        <h3>{{$post->title}}</h3>
        @foreach($posts as $post)

            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>

        @endforeach

    </ul>


@endsection