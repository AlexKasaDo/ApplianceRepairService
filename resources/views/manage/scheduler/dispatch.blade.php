@extends('layouts.manage')
@section('content')

    <Scheduler :urldatauser="{{json_encode($user)}}" :urldataeventtype="{{json_encode($eventType)}}" ></Scheduler>

@endsection
