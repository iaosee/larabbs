@extends('layouts.app')

@section('title', '用户信息')

@section('content')
    <section>
        <!-- <div class="user-intro">
            <div class="card">
                <div class="avatar-wrap">
                    <img class="rounded-circle avatar img-responsive" src="{{ $user->avatar }}" alt="user avatar">
                </div>
                <div class="media-body">
                    <h2> <small>@</small> {{ $user->name }}</h2>
                    <ul>
                        <li>{{ $user->name }}</li>
                        <li>加入于 {{ $user->created_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-3">
                <aside class="">
                    <div class="card aside user-intro">
                        @include('users._user_heading', $user)
                        <div class="card-body">
                            <hr>
                            <h4 class="h6 text-muted"><strong>个人简介</strong></h4>
                            <p>{{ $user->introduction }}</p>
                            <hr>
                            <h4 class="h6 text-muted"><strong>加入于</strong></h4>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                            <h4 class="h6 text-muted"><strong>最后活跃</strong></h4>
                            <p>{{ $user->last_actived_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-md-9">
                {{-- 用户发布的内容 --}}
                <div class="topic-wrap">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(if_query('tab', null)) }}" href="{{ route('users.show', $user->id) }}">Ta 的话题</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(if_query('tab', 'replies')) }}" href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}">Ta 的回复</a>
                        </li>
                    </ul>
                    {{-- @include('topics._topic_list', ['topics' => $user->topics()->recent()->paginate(15)]) --}}

                    @if (if_query('tab', 'replies'))
                        @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(15)])
                    @else
                        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(15)])
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection