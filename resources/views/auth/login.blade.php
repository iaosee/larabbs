@extends('layouts.app')

@section('content')
<section>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form class="user-form" action="">
                <div class="text-center page-header">
                    <h1 class="page-title h3">登录</h1>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="邮箱 或 用户名">
                    <!-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码">
                    <p><small><a href="{{ route('password.request') }}">忘记密码?</a></small></p>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember-check">
                    <label class="form-check-label" for="remember-check">记住登录状态</label>
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">登录</button>
                    <p>还没有账户？<a href="{{ route('register') }}">立即注册</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
