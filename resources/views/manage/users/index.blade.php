@extends('layouts.manage')

@section('content')
    <div class="row m-5">
        <div class="columns">
            <h1 class="title">Manage Users</h1>

            <a href="{{route('users.create')}}" class="btn-secondary btn-lg"> Create New User</a>
        </div>



        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td> <a href="{{Route('users.show', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                    <td><a class="btn btn-outline-dark" href="{{Route('users.edit', $user->id)}}" role="button">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>




@endsection