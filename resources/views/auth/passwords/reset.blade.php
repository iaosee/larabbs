@extends('layouts.app')

@section('content')
<section>
    <div class="error-info">
        @include('shared._errors')
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="user-form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="text-center page-header">
                    <h1 class="page-title h3">重置密码</h1>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="邮箱" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="密码"  name="password" value="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="确认密码"  name="password_confirmation" value="">
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">重置</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
