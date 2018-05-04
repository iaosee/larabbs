@extends('layouts.app')

@section('title', '修改资料')

@section('content')

<section>
    <div class="error-info">
        @include('shared._errors')
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="user-form" method="POST" action="{{ route('users.update', $user->id) }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="text-center page-header">
                    <h1 class="page-title h3">修改资料</h1>
                </div>
                <div class="form-group">
                    <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="用户名" autofocus name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="邮箱"  name="email" value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="个人简介" name="introduction">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <!-- <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="密码"  name="password" value="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="确认密码"  name="password_confirmation" value="">
                </div> -->
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">保存</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection