@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="card mb-3">
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <h3>{{$job->service->name}} <small class="text-muted">#{{$job->id}}</small></h3>
                        <p>Job for <a href="{{ route('contacts.show', $job->contact_id) }}">{{$job->contact->name}}</a>
                        </p>
                        <p>{{$job->contact->address_address}}</p>

                        <a class="fa-link" data-toggle="collapse" href="#scope" role="button"
                           aria-expanded="false" aria-controls="multiCollapseExample1">
                            Scope of Work
                        </a>
                        <div class="collapse multi-collapse" id="scope">
                            <p> {{$job->scope_of_work}}</p>
                        </div>
                        <div><span class="badge badge-primary">{{$job->status->name}}</span></div>
                    </div>
                    <div class="col-md-4 offset-md-4 text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Start Job</button>
                            <button type="button" class="btn btn-secondary">On Hold</button>
                            <button type="button" class="btn btn-secondary">Make Complete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <ul class="nav nav-pills justify-content-end small">
                    <li class="nav-item dropdown">
                        <a class="btn btn-sm dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Add</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Note</a>
                            <a class="dropdown-item" href="#">Attachments</a>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <a class="btn btn-sm" href="{{ route('jobs.edit', $job->id) }}">Edit Job</a>
                            <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                                    id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-reference="parent">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a class="dropdown-item" href="#">Delete Job</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header ">
                <div class="row">
                    <div class="text-left col-6">
                        <b>Schedule</b>
                    </div>
                </div>

            </div>
            <div class="card-body "><!--card-body  START-->

                <div class="new-task-click-toggle">
                    <form class="task_form record first"
                          accept-charset="UTF-8" data-remote="true" method="post">
                        @csrf

                        <!-- DATE Picker START -->
                            <data-form :urldatauser="{{json_encode($user)}}" :urldataeventtype="{{json_encode($eventType)}}"></data-form>

                        <!-- DATE Picker END -->

                    </form>
                </div>


            </div><!-------------------------------------------------card-body  END ----------------------------------------->
        </div>

        <div id="attachmentsJobs">
        <note-component token="{{csrf_token()}}"  id="{{$job->id}}"></note-component>
        <attachment-component id="{{$job->id}}" token="{{csrf_token()}}" ></attachment-component>
        </div>
    <div class="card mb-3">
        <div class="card-header">
            <b>Job History</b>
        </div>

        <ul class="list-group list-group-flush">
            @foreach($job->history as $h)
                <li class="list-group-item">
                    <small>{{$h->created_at}}</small>
                    <p><b>{{$h->user->name}}</b> {{$h->action}} {{$h->component}}
                        #{{$h->job_id}} {{$h->job->service->name}}</p>
                </li>
            @endforeach
        </ul>
    </div>
    </div>
    @push('scripts')
    <script src="{{asset('js/notes.js')}}"></script>
    @endpush


@endsection