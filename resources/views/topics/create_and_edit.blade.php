@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/simplemde/simplemde.min.css') }}">
@endsection

@section('content')
<div class="container">
    @include('shared._errors')
    <!-- <div class="col-md-10 offset-md-1"> -->

        <div class="create-topic">
            @if( $topic->id )
            <form class="user-form" method="POST" action="{{ route('topics.update', $topic->id) }}">
                <input type="hidden" name="_method" value="PUT">
            @else
            <form class="user-form" method="POST" action="{{ route('topics.store') }}">
            @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="text-center page-header">
                    <h1 class="page-title h3">新建话题</h1>
                </div>
                <!-- <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">分类</button>
                        <div class="dropdown-menu">
                            @foreach ($categories as $value)
                            <a class="dropdown-item" href="#">{{ $value->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="标题">
                </div> -->
                <div class="form-group">
                    <input type="name" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" placeholder="标题" autofocus name="title" value="{{ old('title', $topic->title) }}">
                </div>
                <div class="form-group">
                    <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ''}}" name="category_id" >
                        <option value="" hidden disabled selected>请选择分类</option>
                        @foreach ($categories as $value)
                        <option {{ old('category_id') == $value->id || $topic->category_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}" >{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" id="editor" rows="3" placeholder="请填入内容。" >{{ old('body', $topic->body ) }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block form-submit-button">发布</button>
                </div>
            </form>
        </div>

    <!-- </div> -->
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/simplemde/simplemde.min.js') }}"></script>
<script type="text/javascript">
    var simplemde = new SimpleMDE({ element: document.querySelector('#editor') });
</script>
@endsection