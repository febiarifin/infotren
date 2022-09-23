@extends('layouts.admin')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home') }}"><b>{{ config('app.name') }}</b></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Login untuk manajemen pesantren</p>

            <form action="{{ route('login') }}" method="post">
                <div class="form-group has-feedback @error('email') has-error @enderror">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group has-feedback @error('password') has-error @enderror">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
