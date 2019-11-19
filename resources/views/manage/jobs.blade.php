@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="alert alert-success">
            <ul class="nav nav-pills nav-justified col" id="pills-tab" role="tablist">
                @foreach($status as $stat)
                    <li class="nav-item">
                        <a class="nav-link btn-lg m-3 @if($loop->first) active @endif" id="{{$stat->name}}" data-toggle="pill" href="#{{$stat->name}}"
                           role="tab"
                           aria-controls="pills-home" aria-selected="true">{{$stat->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
