@extends('layouts.manage')
@section('content')

    <calendar  :urldatauser="{{json_encode($user)}}" :urldataeventtype="{{json_encode($eventType)}}"></calendar>

@endsection
