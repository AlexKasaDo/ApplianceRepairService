@extends('layouts.manage')

@section('content')
    <div class="container-fluid list-page-row p-4">
        <h2>New Jobs</h2>
        <form class="form-group" action="{{route('jobs.store')}}" method="post">
            @csrf
            <div class="card mb-3">
                <div class="card-header"><b>General Information</b></div>
                <div class="card-body ">
                    <div class="form-group row justify-content-center">
                        <label for="service" class="col-sm-2 col-form-label">Service</label>
                        <div class="col-6">
                            <select class="form-control @error('service') is-invalid @enderror" name="service"
                                    id="service" required>
                                <option disabled selected class="d-none">Choose a Service</option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}"
                                        {{
                                        (collect(old('service'))->contains($service->id))  ? 'selected':''
                                        }}>{{$service->name}}</option>
                                @endforeach
                            </select>
                            @error('service')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                      name="description" rows="5"
                                      placeholder="(optional)">{{ old('description')}}</textarea>
                        </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="scope" class="col-sm-2 col-form-label">Scope of work</label>
                        <div class="col-6">
                                <textarea id="scope" class="form-control @error('scope') is-invalid @enderror"
                                          name="scope" rows="5" required>{{ old('scope')}}</textarea>
                        </div>
                        @error('scope')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header"><b>Who is this for?</b></div>
                <div class="card-body ">
                    <div class="form-group row justify-content-center">
                        <label for="service" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-6">
                            <select class="form-control @error('contact') is-invalid @enderror" name="contact"
                                    id="service" required>
                                <option disabled selected class="d-none">Choose a Contacts</option>
                                @foreach($contacts as $contact)
                                    <option value="{{$contact->id}}"
                                        {{
                                        (collect(old('contact'))->contains($contact->id))  ? 'selected':''
                                        }}>{{$contact->name}}</option>
                                @endforeach
                            </select>
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>
@endsection
