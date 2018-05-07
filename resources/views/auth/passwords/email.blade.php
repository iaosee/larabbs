@extends('layouts.app')
@section('title', '找回密码')

@section('content')
<section>
    <div class="error-info">
        @include('shared._errors')
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="user-form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="text-center page-header">
                    <h1 class="page-title h3">找回密码</h1>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" autofocus required placeholder="注册邮箱" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">发送重置邮件</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
