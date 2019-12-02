@extends('layouts.app')


@section('content')


    <form method="post" action="/cms/public/posts">

        {{csrf_field()}}

        <input type="text" name="title" placeholder="Enter Title">

        <input type="submit" name="submit">

    </form>




@endsection
