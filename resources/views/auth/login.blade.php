@extends('layouts.auth')
@section('content')
<div class="auth-box row">
    <div class="col-lg-8 col-md-5 text-center" style="background-image: url('{{ asset('public/img/pokedex.png') }}'); background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <h2 class="customtitle"></h2>

    </div>
    <div class="col-lg-4 col-md-7">
        <div class="p-3">
            <h2 class="mt-3">SIGN IN</h2>
            <form class="mt-4" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <span class="help-block">
                        @if(Session::has('errors'))
                         <strong style="color: black;">  {{ Session::get('errors')}}</strong>   
                        @endif 
                        </span>
                        <div class="form-group">
                            <label class="text-dark" for="uname">USERNAME</label>
                            <input class="form-control" id="uname" type="text" name="username" 
                                placeholder="Enter your username" value="{{Session::get('myusername')}}" autofocus required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="pwd">PASSWORD</label>
                            <input class="form-control" id="pwd" type="password" name="password" 
                                placeholder="Enter your password" required>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                    </div>
                </div>
                <p class="mb-1">
                  @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">&nbsp;</a>
                  @endif
                </p>
            </form>
        </div>
    </div>
</div>
@endsection