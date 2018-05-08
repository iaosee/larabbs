@extends('layouts.app')

@section('title', '用户信息')

@section('content')
    <section>
        <!-- <div class="user-intro">
            <div class="card">
                <div class="avatar-wrap">
                    <img class="rounded-circle avatar img-responsive" src="{{ config('app.url') . $user->avatar }}" alt="user avatar">
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
                <div class="card user-intro">
                    <div class="text-center">
                        <img class="img-thumbnail rounded avatar" src="{{ config('app.url') . $user->avatar }}" width="300px" height="300px">
                        <h1 class="h4"> <small class="text-info">@</small> <span class="text-success user-name">{{ $user->name }}</span></h1>
                    </div>
                    <div class="card-body">
                        <hr>
                        <h4 class="h6 text-muted"><strong>个人简介</strong></h4>
                        <p>{{ $user->introduction }}</p>
                        <hr>
                        <h4 class="h6 text-muted"><strong>加入于</strong></h4>
                        <p>{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="text-info">
                    <h1 class="">{{ $user->name }} </h1>
                    <h2 class="">{{ $user->email }} </h2>
                </div>

                {{-- 用户发布的内容 --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection