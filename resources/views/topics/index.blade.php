@extends('layouts.app')
@section('title', isset($category) ? $category->name : '话题列表')


@section('content')
<section>
    <div class="row">
        <div class="col-md-9">
            <div class="topic-wrap">
                @if( isset($category) )
                <div>
                    <button class="btn btn-info pull-left category-button" title="{{ $category->description }}">{{ $category->name }}</button>
                </div>
                @else
                <div>
                    <button class="btn btn-info pull-left category-button">所有话题</button>
                </div>
                @endif
                <div class="clearfix">
                    <div class="btn-group pull-right" role="group">
                        <a href="{{ Request::url() }}?order=default" class="btn btn-light text-muted {{ active_class( !if_query('order', 'recent')) }}">最后回复</a>
                        <a href="{{ Request::url() }}?order=recent" class="btn btn-light text-muted {{ active_class(if_query('order', 'recent')) }}">最新发布</a>
                    </div>
                </div>

                @include('topics._topic_list', ['topics' => $topics])
            </div>
        </div>
        <div class="col-md-3">
            <aside class="aside">
                <div class="">
                    <a href="{{ route('topics.create') }}" class="btn btn-block btn-success"><i class="icon iconfont icon-survey1"></i>发布话题</a>
                </div>
            </aside>
            <aside class="mt-4 aside">
                <div class="h6 text-center">活跃用户</div>
                <ul class="list-group list-group-flush">
                    @foreach ($active_users as $active_user)
                    <li class="list-group-item">
                        <a class="" href="{{ route('users.show', $active_user->id) }}">
                            <img class="rounded-circle img-responsive user-avatar" src="{{ $active_user->avatar }}" width="25px" height="25px">
                            <span>{{ $active_user->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</section>
@endsection