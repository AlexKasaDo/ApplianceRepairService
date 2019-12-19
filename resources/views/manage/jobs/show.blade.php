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
                        <div id="app">
                            <data-form :urldatauser="{{json_encode($user)}}" :urldataeventtype="{{json_encode($eventType)}}"></data-form>
                         </div>

                        <!-- DATE Picker END -->

                    </form>
                </div>


            </div><!-------------------------------------------------card-body  END ----------------------------------------->
        </div>
<<<<<<< HEAD
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="text-left col-6">
                        <b>Notes</b>
                    </div>
                    <div class="text-right col-6">
                        <button class="btn btn-sm" id="buttonNoteAdd">
                            Add Note
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body ">

                <form id="noteAdd" class="d-none form-group" action="{{ route('note.create',$job->id) }}" method="post">
                    @csrf
                    <label for="note"><b>Add a new note</b></label>
                    <textarea id="note" class="form-control" name="text"></textarea>
                    <div class="form-group">
                        <button type="button" id="saveNote" class="btn btn-success">Save</button>
                        <button type="button" id="cancelNote" class="btn btn-link">Cancel</button>
                    </div>
                </form>

                <ul class="list-group list-group-flush">
                    @foreach($job->notes as $h)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="text-left col-9">
                                    <p><small>{{$h->created_at}} </small><b>{{$h->user->name}}</b>
                                        #{{$h->job_id}}</p>
                                    <p>{{$h->text}}</p>
                                </div>
                                <div class="text-right col-3">
                                    <button class="btn update-note"  type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                             viewBox="0 0 24 24">
                                            <path
                                                    d="M4.765 20.467l-1.328 2.443s-1.649.425-2.682 1.09l-.258-.257 1.237-1.237c.108-.109.249-.178.401-.196.084-.011.166-.048.23-.113.155-.155.155-.407 0-.562s-.407-.155-.562 0c-.065.065-.103.146-.113.23-.019.152-.088.293-.196.402l-1.237 1.237-.257-.258c.672-1.044 1.09-2.682 1.09-2.682l2.443-1.329 1.232 1.232zm18.923-18.3c.209-.246.312-.549.312-.851 0-.726-.589-1.316-1.316-1.316-.302 0-.604.103-.851.312 0 0-12.252 9.474-14.236 11.458-1.383 1.383-1.677 2.673-3.49 6.327l1.795 1.796c3.425-1.699 4.857-2.021 6.327-3.49 1.982-1.979 11.459-14.236 11.459-14.236z"/>
                                        </svg>
                                    </button>
                                    <button class="btn delete-note" data-id="{{$h->id}}" data-url="{{route('note.delete',$h->id)}}" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                             width="14" height="14"
                                             viewBox="0 0 24 24"
                                             style=" fill:#000000;">
                                            <path
                                                    d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"></path>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
=======
>>>>>>> 634a0a6c149f357be032096ab45512e1c14ac938

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