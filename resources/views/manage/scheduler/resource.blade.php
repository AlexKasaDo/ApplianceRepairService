@extends('layouts.manage')
@section('content')

    <resource  :urldatauser="{{json_encode($user)}}" :urldataeventtype="{{json_encode($eventType)}}"></resource>

@endsection
