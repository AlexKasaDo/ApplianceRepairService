@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <form action="{{route('status-jobs.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name status</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                       name="name" value="{{old('name')}}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <a href="{{ route('status-jobs.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary btn-save">Save</button>
            </div>
        </form>
    </div>
@endsection
