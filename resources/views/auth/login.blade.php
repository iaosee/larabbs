@extends('layouts.app')

@section('content')
<section>
    <div class="error-info">
        @include('shared._errors')
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="user-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="text-center page-header">
                    <h1 class="page-title h3">登录</h1>
                </div>
                <div class="form-group">
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="email" placeholder="邮箱 或 用户名" autofocus name="email" value="{{ old('email') }}">
                    <!-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    <!-- @if( $errors->has('email') )
                    <div class="invalid-feedback">
                        请输入正确的邮箱。
                    </div>
                    @endif -->
                </div>
                <div class="form-group">
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" type="password" placeholder="密码" name="password" value="{{ old('password') }}">
                    <!-- @if( $errors->has('password') )
                    <div class="invalid-feedback">
                        请输入正确的密码。
                    </div>
                    @endif -->
                    <p><small><a tabindex="-1" href="{{ route('password.request') }}">忘记密码?</a></small></p>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember-check">
                    <label class="form-check-label" for="remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>记住登录状态</label>
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">登录</button>
                    <p>没有账户？<a href="{{ route('register') }}">立即注册</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
