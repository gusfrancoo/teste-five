@extends('layouts.app')

@section('content')
    <view-files :files="{{json_encode($files)}}">
    </view-files>

@endsection
