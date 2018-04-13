@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row testimonial--padding">
        <div class="md-col-8 md-offset-2">
            <div class="panel panel--default">
                <div class="panel__header">Login</div>

                <div class="panel__body">
                    <form class="form--horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form__group {{ $errors->has('email') ? ' has__danger' : '' }}">
                            <label for="email" class="md-col-4 from__label md-text-align-right">E-Mail Address</label>

                            <div class="md-col-6">
                                <input id="email" type="email" class="form__item" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="form__helper">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form__group {{ $errors->has('password') ? ' has__danger' : '' }}">
                            <label for="password" class="md-col-4 from__label md-text-align-right">Password</label>

                            <div class="md-col-6">
                                <input id="password" type="password" class="form__item" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="form__helper">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form__group ">
                            <div class="md-col-6 md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form__group ">
                            <div class="md-col-8 md-offset-4">
                                <button type="submit" class="btn btn--primary">
                                    Login
                                </button>

                                <a class="btn btn--default" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
