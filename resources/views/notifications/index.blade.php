@extends('layouts.app')

@section('title', '用户信息')

@section('content')
    <section>
        <div class="row">
            <div class="col-md-3">
                <aside class="">
                    <div class="card aside user-intro">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action active">通知</a>
                            <a href="#" class="list-group-item list-group-item-action">系统消息</a>
                            <a href="#" class="list-group-item list-group-item-action">私信</a>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="message-wrap">
                    <div class="message-title">
                        <h4 class="text-left">
                            我的通知
                        </h4>
                        <!-- <hr> -->
                    </div>
                    <div class="message-list">
                        @if ($notifications->count())
                        <div class="notification-list">
                            @foreach ($notifications as $notification)
                                @include('notifications.types._' . snake_case(class_basename($notification->type)))
                            @endforeach
                            {!! $notifications->render() !!}
                        </div>
                        @else
                        <div class="empty-block">没有消息通知！</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection