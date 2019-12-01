@extends('layouts.manage')

@section('content')
    <div class="container-fluid  list-page-row p-4">
        <div class="columns">
            <h1 class="title">Manage Status Jobs</h1>
        </div>
    </div>
        <div class="list-page-row p-4">
            <a href="{{ route('status-jobs.create') }}" class="btn-secondary btn-lg">
                Create New Status
            </a>
        </div>

    <div class="container-fluid  list-page-row p-4">
    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Date Created</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($status as $stat)
            <tr>
                <td>{{$stat->name}}</td>
                <td>{{$stat->created_at->toFormattedDateString()}}</td>
                <td><a class="btn btn-outline-dark" href="status-jobs/{{$stat->id}}/edit" role="button">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $status->links() }}

    </div>

@endsection
