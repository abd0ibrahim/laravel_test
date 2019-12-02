@extends('layouts.app')

@section('content')

    <h1> Contact Page</h1>

    @if(count($people))

        <ul>

        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach

        </ul>

    @endif

@stop

@section('footer')

    <script>
        alert('Helloooo')
    </script>


@stop

{{--<html>--}}
{{--<head>--}}
{{--    <title>App Name - @yield('title')</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--@section('sidebar')--}}
{{--    This is the master sidebar.--}}
{{--@show--}}

{{--<div class="container">--}}

{{--</div>--}}
{{--</body>--}}
{{--</html>--}}