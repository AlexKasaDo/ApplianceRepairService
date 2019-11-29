@extends('layouts.manage')
@section('content')
    <div class="content m-3">
        <form  action="{{ route('users.store')}}" method="POST" >
            @csrf
            <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label class=" col-form-label" for="Username">{{ __('Login') }}</label>
                        <input  class="form-control @error('login') is-invalid @enderror" id="username" name="username" aria-describedby="emailHelp"
                                placeholder="Enter Username" value="{{ old('Login') }}">
                     </div>


                <div class="col-md-4 mb-3">
                    <label for="name" class=" col-form-label">{{ __('Full name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                        @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                 </div>

                <div class="col-md-4 mb-3">
                    <label for="name" class=" col-form-label ">{{ __('Phone') }}</label>

                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" placeholder="Phone" autofocus>

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

            </div>



            <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>

                <div class="col-md-6 mb-3">
                    <label for="address" class="col-form-label">{{ __('Address') }}</label>
                    <input id="address" type="text" class="form-control" name="password" placeholder="Address" required >
                </div>
            </div>

            <div class="form-group">
                <label class=" control-label">Login Allowed</label>
                <div class="col-md-12">
                    <label class="radio-inline">
                        <input type="radio" value="true" name="status" id="status_true">
                        Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="false" checked="checked" name="status" id="status_false">
                        No
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label for="password" class="col-form-label ">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')

                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                <label for="password-confirm" class="col-form-label ">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group">
                <label for="note" class="col-form-label">{{ __('Note') }}</label>
                <textarea id="note" class="form-control" name="note" placeholder="write some text here"  ></textarea>
            </div>

            <button type="submit"   class="btn btn-primary">Create</button>
        </form>
    </div>

    <div id="app"> @{{ message }}</div>


@endsection


