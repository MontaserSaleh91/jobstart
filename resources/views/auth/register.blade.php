@extends('layouts.main')

@section('content')
<div class="album text-muted">
<div class="container">
    <div class="row">
            <h1>Seeker Registration</h1>   

            
              <div class="container">
                <div class="row">
               @if(Session::has('message'))
                         <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif

        <div class="col-md-12 col-lg-8 mb-5">
            
                

                    <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
                        @csrf
                        
                        <input type="hidden" value="seeker" name="user_type">
                        <div class="form-group row">
                            <label for="name" class="col-md-12">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="dob" class="col-md-12">{{ __('Date of Birth') }}</label>
    
                                <div class="col-md-12">
                                    <input  type="date" id="datepicker" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" autocomplete="off" value="{{ old('dob') }}" required>
    
                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                                <label for="gender" class="col-md-12">{{ __('Gender') }}</label>
    
                                <div class="col-md-12">
                                    <input type="radio" name="gender" value="male" required="">Male <br>
                                    <input type="radio" name="gender" value="female" >Female 
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                  
                </div>
            </div> 
        
        </div>
    </div>
</div>
@endsection
