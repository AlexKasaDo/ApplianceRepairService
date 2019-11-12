@extends('layouts.manage')

@section('content')
    <div class="row  m-3"> <!-- START ROW -->
        <div class="information col-md-12">
            <h2>Add New Contact</h2>
            <hr>

                        <div class="mb-5" id="address-map-container" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>



                <form action="{{route('contacts.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Full name</label>
                            <input type="text" class="form-control" name="name"  id="name" placeholder="Full name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="address_address">Address</label>
                        <input type="text" id="address-input" name="address_address" class="form-control map-input">
                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                    </div>
                    <div class="form-group">
                        <label for="Instruction">Special instruction</label>
                        <input type="text" class="form-control" id="instruction" name="instruction" placeholder="Apartment, studio, or floor">
                    </div>



                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
    </div><!-- START ROW -->




@endsection