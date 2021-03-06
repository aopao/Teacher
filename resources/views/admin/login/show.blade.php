@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('v1/css/login.min.css') }}">
@endsection
@section('content')
    <body class="animsition page-login-v2 layout-full page-dark" style="background: transparent;">
    @include('commons.browser')
    <!-- Page -->
    <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="brand">
                    <img class="brand-img" src="{{ asset('v1/images/logo@2x.png') }}" alt="{{ $setting['web_name'] }}">
                    <h2 class="brand-text font-size-40">{{ $setting['web_name'] }}</h2>
                </div>
                <p class="font-size-20">{{ $setting['login_message'] }}</p>
            </div>
            <div class="page-login-main animation-slide-right animation-duration-1">
                <div class="brand hidden-md-up">
                    <img class="brand-img" src="{{ asset('v1/images/logo-colored@2x.png') }}" alt="...">
                    <h3 class="brand-text font-size-40">{{ $setting['web_name'] }}<</h3>
                </div>
                <h3 class="font-size-24">@lang('admin.login_title')</h3>
                <form method="post" action="{{ route('admin.login') }}">
                    <div class="form-group">
                        <label class="sr-only" for="inputUserName">@lang('form.username_phone'):</label>
                        <input type="text" class="form-control" id="inputUserName" name="username" placeholder="@lang('form.username_phone')">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPassword">@lang('form.password'):</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="@lang('form.password')">
                    </div>
                    <div class="form-group clearfix">
                        <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe">@lang('form.remmber')</label>
                        </div>
                        <a class="float-right" href="forgot-password.html">@lang('form.forget_password')</a>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-block">@lang('form.submit')</button>
                </form>
                <p>@lang('form.guest')? <a href="register-v2.html">@lang('form.register_user')</a></p>
                <footer class="page-copyright">
                    <p>{{ $setting['web_name'] }}</p>
                    <p>{{ $setting['copyright'] }}</p>
                </footer>
            </div>
        </div>
    </div>
    <!-- End Page -->
@endsection