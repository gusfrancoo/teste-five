@extends('layouts.app')

@section('content')
    <home-page :session-status="{{json_encode(session('status'))}}">

    </home-page>
@endsection


