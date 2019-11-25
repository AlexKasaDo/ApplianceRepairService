@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="columns">
            <h1 class="title">Manage Status Jobs</h1>
            <a href="{{ route('status-jobs.create') }}" class="btn-secondary btn-lg">
                Create New Status
            </a>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Date Created</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($status as $stat)
            <tr>
                <th scope="row">{{$stat->id}}</th>
                <td>{{$stat->name}}</td>
                <td>{{$stat->created_at->toFormattedDateString()}}</td>
                <td><a class="btn btn-outline-dark" href="#" role="button">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $status->links() }}



@endsection
