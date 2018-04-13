@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="md-col-8 md-offset-2">
            @if (session('status'))
                <div class="notify notify--success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="panel panel--default">
                <div class="panel__header">Reset Password</div>

                <div class="panel__body">

                    <form class="form--horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form__group{{ $errors->has('email') ? ' has__danger' : '' }}">
                            <label for="email" class="md-col-4 form__label md-text-align-right">E-Mail Address</label>

                            <div class="md-col-8">
                                <input id="email" type="email" class="form__item" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <small class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form__group">
                            <div class="md-col-6 md-offset-4">
                                <button type="submit" class="btn btn--primary">
                                    Send Password Reset Link
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
