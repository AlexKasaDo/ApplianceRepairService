@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="columns">
            <h1 class="title">Manage Service</h1>
        </div>
    </div>
        <div class="list-page-row p-4">
            <a href="{{ route('services.create') }}" class="btn-secondary btn-lg">
                Create New Service
            </a>
        </div>

    <div class="container-fluid list-page-row p-4">
        <div class="alert alert-success">
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="active-tab" data-toggle="pill" href="#active" role="tab"
                       aria-controls="active" aria-selected="false">Active Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="no-active-tab" data-toggle="pill" href="#no-active" role="tab"
                       aria-controls="no-active" aria-selected="false">Inactive Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all" role="tab"
                       aria-controls="all" aria-selected="true">All Service</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show " id="active" role="tabpanel" aria-labelledby="active-tab">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Active</th>
                        <th scope="col" class="text-center">Bookable</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($active as $ac)
                        <tr>
                            <td>{{$ac->name}}</td>
                            <td class="text-center"><input type="checkbox" class="form-check-input"
                                                           @if($ac->is_active)checked @endif></td>
                            <td class="text-center"><input type="checkbox" class="form-check-input text-center"
                                                           @if(!$ac->is_active)checked @endif></td>
                            <td><a class="btn btn-outline-dark" href="service/{{$ac->id}}/edit" role="button">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $active->links() }}
            </div>
            <div class="tab-pane fade" id="no-active" role="tabpanel" aria-labelledby="no-active-tab">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Active</th>
                        <th scope="col" class="text-center">Bookable</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inactive as $in)
                        <tr>
                            <td>{{$in->name}}</td>
                            <td class="text-center"><input type="checkbox" class="form-check-input"
                                                           @if($in->is_active)checked @endif></td>
                            <td class="text-center"><input type="checkbox" class="form-check-input text-center"
                                                           @if(!$in->is_active)checked @endif></td>
                            <td><a class="btn btn-outline-dark" href="service/{{$in->id}}/edit" role="button">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $inactive->links() }}
            </div>
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Active</th>
                        <th scope="col" class="text-center">Bookable</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $al)
                        <tr>
                            <td>{{$al->name}}</td>
                            <td class="text-center"><input type="checkbox" class="form-check-input"
                                                           @if($al->is_active)checked @endif></td>
                            <td class="text-center"><input type="checkbox" class="form-check-input text-center"
                                                           @if(!$al->is_active)checked @endif></td>
                            <td><a class="btn btn-outline-dark" href="service/{{$al->id}}/edit" role="button">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $all->links() }}
            </div>
        </div>
    </div>
@endsection
