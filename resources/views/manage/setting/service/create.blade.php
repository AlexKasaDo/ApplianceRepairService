@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <h2>New Service</h2>
        <form class="form-group" action="{{ route('services.store') }}" method="post">
            @csrf
            <div class="card mb-3">
                <div class="card-header"><b>Service Information</b></div>
                <div class="card-body ">
                    <div class="form-group row justify-content-center">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-6">
                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text"
                                   name="name" value="{{old('name')}}" required>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="description" class="col-sm-2 col-form-label">Marketing Description</label>
                        <div class="col-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                      name="description" rows="5"
                                      required>{{ old('description')}}</textarea>
                        </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-6">
                            <select class="form-control @error('status') is-invalid @enderror" name="status"
                                    id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group text-right">
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary btn-save">Save</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
