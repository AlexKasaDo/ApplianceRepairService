@extends('layouts.manage')

@section('content')
    <div class="row  m-3"> <!-- START ROW -->
        <div class="information col-md-12">
            <h2>Add New Contact</h2>
            <hr>

            <div class="mb-5" id="address-map-container" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>


            <form action="{{ route('contacts.update', $contacts->id)}}" method="POST">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name"
                               placeholder="Full name" value="{{$contacts->name }}" required>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                           placeholder="Email" value="{{$contacts->email }}" required>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPhone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                           placeholder="Phone" value="{{$contacts->phone }}" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address_address">Address</label>
                    <input type="text" id="address-input" name="address_address"
                           class="form-control map-input @error('address_address') is-invalid @enderror"
                           value="{{$contacts->address_address }}" required>
                    <input type="hidden" name="address_latitude" id="address-latitude"
                           value="{{ $contacts->address_latitude}}"/>
                    <input type="hidden" name="address_longitude" id="address-longitude"
                           value="{{ $contacts->address_longitude}}"/>
                </div>
                <div class="form-group">
                    <label for="instruction">Special instruction</label>
                    <input class="form-control @error('instruction') is-invalid @enderror" id="instruction"
                              name="instruction"
                              placeholder="Apartment, studio, or floor" value="{{ $contacts->instruction}}" rows="5">{{ old('instruction') }} </input>
                    @error('instruction')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div><!-- START ROW -->




@endsection
