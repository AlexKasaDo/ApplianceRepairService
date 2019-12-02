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
                            <td class="text-center">
                                @if($ac->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#000000;">
                                        <path
                                            d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 9.2421875 L 19 11.242188 L 19.001953 19 L 5 19 L 5 5 L 16.757812 5 L 18.757812 3 L 5 3 z M 21.292969 3.2929688 L 11 13.585938 L 7.7070312 10.292969 L 6.2929688 11.707031 L 11 16.414062 L 22.707031 4.7070312 L 21.292969 3.2929688 z"></path>
                                    </svg>
                                @endif</td>
                            <td class="text-center">
                                @if(!$ac->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#000000;">
                                        <path
                                            d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 9.2421875 L 19 11.242188 L 19.001953 19 L 5 19 L 5 5 L 16.757812 5 L 18.757812 3 L 5 3 z M 21.292969 3.2929688 L 11 13.585938 L 7.7070312 10.292969 L 6.2929688 11.707031 L 11 16.414062 L 22.707031 4.7070312 L 21.292969 3.2929688 z"></path>
                                    </svg>
                                @endif</td>
                            <td><a class="btn btn-outline-dark" href="services/{{$ac->id}}/edit" role="button">Edit</a>
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
                            <td class="text-center">
                                @if($in->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#000000;">
                                        <path
                                            d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 9.2421875 L 19 11.242188 L 19.001953 19 L 5 19 L 5 5 L 16.757812 5 L 18.757812 3 L 5 3 z M 21.292969 3.2929688 L 11 13.585938 L 7.7070312 10.292969 L 6.2929688 11.707031 L 11 16.414062 L 22.707031 4.7070312 L 21.292969 3.2929688 z"></path>
                                    </svg> @endif</td>
                            <td class="text-center">
                                @if(!$in->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#000000;">
                                        <path
                                            d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 9.2421875 L 19 11.242188 L 19.001953 19 L 5 19 L 5 5 L 16.757812 5 L 18.757812 3 L 5 3 z M 21.292969 3.2929688 L 11 13.585938 L 7.7070312 10.292969 L 6.2929688 11.707031 L 11 16.414062 L 22.707031 4.7070312 L 21.292969 3.2929688 z"></path>
                                    </svg>
                                @endif</td>
                            <td><a class="btn btn-outline-dark" href="services/{{$in->id}}/edit" role="button">Edit</a>
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
                            <td class="text-center">
                                @if($al->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#000000;">
                                        <path
                                            d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 9.2421875 L 19 11.242188 L 19.001953 19 L 5 19 L 5 5 L 16.757812 5 L 18.757812 3 L 5 3 z M 21.292969 3.2929688 L 11 13.585938 L 7.7070312 10.292969 L 6.2929688 11.707031 L 11 16.414062 L 22.707031 4.7070312 L 21.292969 3.2929688 z"></path>
                                    </svg>
                                @endif</td>
                            <td class="text-center">
                                @if(!$al->is_active)
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24"
                                         style=" fill:#000000;">
                                        <path
                                            d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 9.2421875 L 19 11.242188 L 19.001953 19 L 5 19 L 5 5 L 16.757812 5 L 18.757812 3 L 5 3 z M 21.292969 3.2929688 L 11 13.585938 L 7.7070312 10.292969 L 6.2929688 11.707031 L 11 16.414062 L 22.707031 4.7070312 L 21.292969 3.2929688 z"></path>
                                    </svg>
                                @endif</td>
                            <td><a class="btn btn-outline-dark" href="services/{{$al->id}}/edit" role="button">Edit</a>
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
