@extends('_layouts.front.index')

@section('content')

    <main id="login--wrapper">
        <div class="auth__wrapper">
            <div class="container position-relative ">

                <form method="POST" action="{{ route('login') }}" >
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 thumbnail" style="padding: 3rem">
                            <div class="auth__from position-relative">
                                {{--<i class="fa fa-sign-in fa-5x text-primary"></i>--}}

                                <div class="form-group">
                                    <h3 class="text-center  m-t-6 m-b-3">
                                        <strong class="heading-title">SIGN IN</strong>
                                    </h3>
                                </div>

                                <div class="form-group-lg form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="EMAIL">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group-lg form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <div>
                                        <input id="password" type="password" class="form-control" name="password" required placeholder="PASSWORD">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-round btn-b btn-block">Login</button>
                                        {{--<hr>--}}
                                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">رمز عبور خود را فراموش کرده اید؟</a>--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>

@endsection
