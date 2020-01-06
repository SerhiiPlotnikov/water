@extends('layout')
@section('content')
    <h3>List of users</h3>
    <users :available-users="{{$users}}">
    </users>
@endsection