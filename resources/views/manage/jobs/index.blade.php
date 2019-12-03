@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="alert alert-success">
            <ul class="nav nav-pills nav-justified col" id="pills-tab" role="tablist">
                @foreach($status as $stat)
                    <li class="nav-item">
                        <a class="nav-link btn-lg m-3 @if($loop->first) active @endif" id="pills-{{$stat->id}}-tab"
                           data-toggle="pill" href="#jobs{{$stat->id}}"
                           role="tab"
                           aria-controls="jobs{{$stat->id}}"
                           @if($loop->first)aria-selected="true" @else aria-selected="false" @endif>{{$stat->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            @foreach($status as $stat)
                <div class="tab-pane fade show @if($loop->first) active @endif" id="jobs{{$stat->id}}" role="tabpanel"
                     aria-labelledby="pills-{{$stat->id}}-tab">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Assigned to</th>
                            <th scope="col">Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs[$stat->name] as $j)

                            <tr>
                                <td scope="row">{{$j->id}}</td>
                                <td><a href="{{ route('jobs.show',$j->id) }}" >{{$j->service->name}}</a></td>
                                <td><a href="{{route('contacts.show', $j->contact->id)}}">{{$j->contact->name}}</a></td>
                                <td>@empty($j->event_id) Unassigned @else {{$j->event_id}} @endempty</td>
                                <td>{{$j->created_at}}</td>
                            </tr>

                        @endforeach
{{--                        {{$jobs[$stat->name]->links()}}--}}
                        </tbody>
                    </table>
                </div>

            @endforeach


        </div>
    </div>
@endsection
