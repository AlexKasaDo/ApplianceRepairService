@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-8">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="page-item active"><a class="page-link" href="#">All</a></li>
                            <li class="page-item"><a class="page-link" href="#">A</a></li>
                            <li class="page-item"><a class="page-link" href="#">B</a></li>
                            <li class="page-item"><a class="page-link" href="#">C</a></li>
                            <li class="page-item"><a class="page-link" href="#">D</a></li>
                            <li class="page-item"><a class="page-link" href="#">E</a></li>
                            <li class="page-item"><a class="page-link" href="#">F</a></li>
                            <li class="page-item"><a class="page-link" href="#">G</a></li>
                            <li class="page-item"><a class="page-link" href="#">H</a></li>
                            <li class="page-item"><a class="page-link" href="#">I</a></li>
                            <li class="page-item"><a class="page-link" href="#">J</a></li>
                            <li class="page-item"><a class="page-link" href="#">K</a></li>
                            <li class="page-item"><a class="page-link" href="#">L</a></li>
                            <li class="page-item"><a class="page-link" href="#">M</a></li>
                            <li class="page-item"><a class="page-link" href="#">N</a></li>
                            <li class="page-item"><a class="page-link" href="#">O</a></li>
                            <li class="page-item"><a class="page-link" href="#">P</a></li>
                            <li class="page-item"><a class="page-link" href="#">Q</a></li>
                            <li class="page-item"><a class="page-link" href="#">R</a></li>
                            <li class="page-item"><a class="page-link" href="#">S</a></li>
                            <li class="page-item"><a class="page-link" href="#">T</a></li>
                            <li class="page-item"><a class="page-link" href="#">U</a></li>
                            <li class="page-item"><a class="page-link" href="#">H</a></li>
                            <li class="page-item"><a class="page-link" href="#">I</a></li>
                            <li class="page-item"><a class="page-link" href="#">J</a></li>
                            <li class="page-item"><a class="page-link" href="#">K</a></li>
                            <li class="page-item"><a class="page-link" href="#">L</a></li>
                            <li class="page-item"><a class="page-link" href="#">M</a></li>
                            <li class="page-item"><a class="page-link" href="#">N</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col text-right">
                    <a class="btn btn-dark" href="{{route('contacts.create')}}">Add a Contact</a>
                </div>
            </div>
                <div class="row">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Service Address</th>
                            <th scope="col">Phone/Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{$contact->id}}</th>
                            <td><a href="{{Route('contacts.show', $contact->id)}}">{{$contact->name}}</a></td>
                            <td>{{$contact->address_address}}</td>
                            <td>{{$contact->phone .' / '. $contact->email }}</td>

                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $contacts->links() }}



            </div>
        </div>
    </div>

@endsection