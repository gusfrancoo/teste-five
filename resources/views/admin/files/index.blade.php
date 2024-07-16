@extends('layouts.app')

@section('content')
    <approval-page :files="{{json_encode($files)}}">

    </approval-page>

@endsection
