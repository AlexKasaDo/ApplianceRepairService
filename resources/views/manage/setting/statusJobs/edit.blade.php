@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <form action="/manage/setting/status-jobs/{{$status->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Edit name</label>
                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="@if($errors->any()) {{ old('name') }} @else {{$status->name}} @endif"
                       required>
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
