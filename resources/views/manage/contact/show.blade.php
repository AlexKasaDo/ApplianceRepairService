@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="panel panel-default">
            <div class="row">
                <div class="col">
                    <h1>Contacts Details</h1>
                </div>
                <div class="col text-right">
                    <a class="btn btn-dark" href="{{route('contacts.edit', $contacts->id)}}">Edit Contact</a>
                </div>

            </div>
            <hr>
            <div class="row mt-2">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{$contacts->name}}</dd>

                    <dt class="col-sm-3">Address</dt>
                    <dd class="col-sm-9">{{$contacts->address_address}}</dd>

                    <dt class="col-sm-3">Phone</dt>
                    <dd class="col-sm-9">{{$contacts->phone }} </dd>

                    <dt class="col-sm-3 text-truncate">Email</dt>
                    <dd class="col-sm-9">{{$contacts->email }}</dd>

                    <dt class="col-sm-3">Special Instruction</dt>
                    <dd class="col-sm-9">{{$contacts->instruction}}</dd>

                    <dt class="col-sm-3">Date of Creating</dt>
                    <dd class="col-sm-9">{{$contacts->created_at}}</dd>
                </dl>








        </div>
    </div>
@endsection