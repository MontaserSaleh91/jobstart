<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="/" class="text-black h2 mb-0">Job<strong>start</strong></a></h1>
          </div>

          <div class="col-10 col-xl-10 d-none d-xl-block">
            <nav class="site-navigation text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li class="as-children">
                      <a href="/">HOME</a>
                       
                      </li>
                @if(!Auth::check())
                <li class="active"><a href="{{route('register')}}">FOR JOB SEEKER</a></li>
                <li class="as-children">
                <a href="{{route('employer.register')}}">FOR EMPLOYER</a>
                </li>
                @elseif(Auth::user()->user_type=='seeker')
                <li class="as-children">
                    <a href="{{route('user.profile')}}">PROFILE</a>
                    </li>
                <li class="as-children">
                    <a href="{{route('home')}}">FAVOURITE</a>
                    </li>
                @else
                <li class="as-children">
                    <a href="{{route('applicant')}}">APPLICATIONS</a>
                    </li>
                @endif
                @if(Auth::check()&&Auth::user()->user_type=='employer')
                <li class="as-children">
                    <a href="{{route('company.view')}}">MY COMPANY</a>
                     
                    </li>
                    <li class="as-children">
                        <a href="{{route('my.job')}}">MY JOBS</a>
                         
                        </li>
                @else
                <li class="as-children">
                    <a href="{{route('company')}}">COMPANIES</a>
                     
                    </li>
                @endif

                @if(!Auth::check())

                <button type="button" class="btn btn-primary text-white py-3 px-4 rounded" data-toggle="modal" data-target="#exampleModal">
              Login
              </button>
              @else
       <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
            </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
      
              @endif
      
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right d-block">
            
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>



    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
       <form method="POST" action="{{ route('login') }}">
                              @csrf
      
                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
      
                                  <div class="col-md-12">
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
      
                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
      
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
                                  <div class="col-md-6 offset-md-4">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      
                                          <label class="form-check-label" for="remember">
                                              {{ __('Remember Me') }}
                                          </label>
                                      </div>
                                  </div>
                              </div>
      
                              <div class="form-group row mb-0">
                                  <div class="col-md-8 offset-md-4">
                                      
      
                                      @if (Route::has('password.request'))
                                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                              {{ __('Forgot Your Password?') }}
                                          </a>
                                      @endif
                                  </div>
                              </div>
      
      
      
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                                          {{ __('Login') }}
              </button>
            </form>
      
            </div>
          </div>
        </div>
      </div>
