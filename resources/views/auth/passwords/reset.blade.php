@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="md-col-8 md-offset-2">
            <div class="panel panel--default">
                <div class="panel__header">Reset Password</div>

                <div class="panel__body">
                    <form class="form--horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form__group{{ $errors->has('email') ? ' has__danger' : '' }}">
                            <label for="email" class="md-col-4 form__label md-text-align-right">E-Mail Address</label>

                            <div class="md-col-8">
                                <input id="email" type="email" class="form__item" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <small class="form__helper">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form__group{{ $errors->has('password') ? ' has__danger' : '' }}">
                            <label for="password" class="md-col-4 form__label md-text-align-right">Password</label>

                            <div class="md-col-8">
                                <input id="password" type="password" class="form__item" name="password" required>

                                @if ($errors->has('password'))
                                    <small class="form__helper">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form__group{{ $errors->has('password_confirmation') ? ' has__danger' : '' }}">
                            <label for="password-confirm" class="md-col-4 form__label md-text-align-right">Confirm Password</label>
                            <div class="md-col-8">
                                <input id="password-confirm" type="password" class="form__item" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <small class="form__helper">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form__group">
                            <div class="md-col-8 md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
