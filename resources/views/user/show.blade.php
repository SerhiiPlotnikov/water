@extends('layout')
@section('content')
    <a href="/users">To main page</a>
    <user
        :user="{{$user}}"
    >
    </user>
@endsection