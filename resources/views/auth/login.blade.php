@extends('layouts.app')

@section('content')
<div class="login-box">
  
                <div class="login-logo">Saberfront DB2</div>
                <div class="login-box-body">
                    <form  method="POST" action="{{ secure_url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input id="email" type="email" class="form-control" name="email" placeholder='E-mail Address' value="{{ old('email') }}" required autofocus><span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                   
                        </div>

                        <div class="row form-group has-feedback">
                 
                            <div class="col-md-6">
                 
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>

                            </div>
                             <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Login
                                </button>

                           
                            </div>

                        </div>
     <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                        
                    </form>
                </div>
            </div>
            </div>
</div>
@endsection
