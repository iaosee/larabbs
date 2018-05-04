@extends('layouts.app')

@section('content')

<section>
    <div class="error-info">
        @include('shared._errors')
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="user-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="text-center page-header">
                    <h1 class="page-title h3">注册</h1>
                </div>
                <div class="form-group">
                    <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="用户名" autofocus name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="邮箱"  name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="密码"  name="password" value="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="确认密码"  name="password_confirmation" value="">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="captcha" class="form-control {{ $errors->has('captcha') ? 'is-invalid' : ''}}" placeholder="验证码"  name="captcha" value="">
                        <div class="input-group-prepend" class="captcha-img-wrap">
                            <div class="input-group-text">
                                <img class="thumbnail captcha-img" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">注册</button>
                    <p>已有账户？<a href="{{ route('login') }}">立即登录</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
