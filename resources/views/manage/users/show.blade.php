@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="panel panel-default">
            <div class="row">
                <div class="col">
                    <h1>Users Details</h1>
                </div>
                <div class="col text-right">
                    <a class="btn btn-dark" href="{{Route('users.edit', $user->id)}}">Edit User</a>
                </div>

            </div>
            <hr>
            <div class="row mt-2">
                <dt class="col-sm-3">Full name</dt>
                <dd class="col-sm-9">{{$user->name}}</dd>

                <dt class="col-sm-3">Login</dt>
                <dd class="col-sm-9">{{$user->username }} </dd>

                <dt class="col-sm-3">Status</dt>
                @if($user->status == 1)
                    <dd class="col-sm-9">Active</dd>
                @else
                    <dd class="col-sm-9">Inactive </dd>
                @endif


                <dt class="col-sm-3">Phone</dt>
                <dd class="col-sm-9">{{$user->phone}}</dd>

                <dt class="col-sm-3 text-truncate">Email</dt>
                <dd class="col-sm-9">{{$user->email }}</dd>

                <dt class="col-sm-3 text-truncate">Roles</dt>
                <dd class=" col-sm-9">
                    {{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet': ""}}
                @foreach($user->roles as $role)
                        {{$role->description}}
                @endforeach
                </dd>
                <dt class="col-sm-3">Date of Creating</dt>
                <dd class="col-sm-9">{{$user->created_at}}</dd>

                <dt class="col-sm-3">Note</dt>
                <dd class="col-sm-9">{{$user->note}}</dd>

            </div>
        </div>
    </div>
@endsection
