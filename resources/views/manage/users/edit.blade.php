@extends('layouts.manage')
@section('content')
    <div class="content m-3">
        <form  action="{{ route('users.update', $user->id)}}" method="POST" >
            {{method_field('PUT')}}
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label class=" col-form-label" for="Username">{{ __('Login') }}</label>
                    <input  class="form-control @error('login') is-invalid @enderror" id="username" name="username" aria-describedby="emailHelp"
                            placeholder="Enter Username" value="{{$user->username }}">
                </div>


                <div class="col-md-4 mb-3">
                    <label for="name" class=" col-form-label">{{ __('Full name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" required autocomplete="name" placeholder="Name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="name" class=" col-form-label ">{{ __('Phone') }}</label>

                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone }}" required autocomplete="name" placeholder="Phone" autofocus>

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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="col-form-label">{{ __('Address') }}</label>
                    <input  type="text" class="form-control" name="address" value="{{$user->address}}" placeholder="Address" required >
                </div>
            </div>
            <div class="form-group">
                <label class=" control-label">Password</label>
                <div class="">
                    <input  class="form-control" disabled  placeholder="********" >
                    <p class="form-control-static mt-3 ">
                        <a href="">Change</a>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class=" control-label">Login Allowed</label>
                <div class="col-md-12">
                    <label class="radio-inline">
                        <input @if($user->status == 1)
                               checked="checked"
                               @endif
                               type="radio" value="1" name="status" id="status_true">
                        Yes
                    </label>
                    <label class="radio-inline">
                        <input
                                @if($user->status !== 1)
                                    checked="checked"
                                @endif
                                type="radio" value="0"  name="status" id="status_false">
                        No
                    </label>
                </div>
            </div>


            <div class="form-group">
                <label for="roles">Roles</label>
                <select class="form-control" onselect="true"  name="roles" id="roles">
                    @foreach($roles as $role)

                    <option
                            @if( isset($user->roles[0]->id) && $role->id == $user->roles[0]->id)
                            {{ 'selected' }}
                            @else
                            {{ '' }}
                            @endif

                            value="{{$role->id}}">
                        {{$role->display_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="note" class="col-form-label">{{ __('Note') }}</label>
                <textarea id="note" class="form-control" name="note"  placeholder="write some text here"  >{{$user->note}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
