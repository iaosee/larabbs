@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/highlight/monokai.css') }}">
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-9">
            <div class="article-wrap">
                <div class="article-heading">
                    <div class="post-title text-center">
                        <h1>{{ $topic->title }}</h1>
                    </div>
                    <div class="text-center text-muted">
                        <span>{{$topic->created_at->diffForHumans()}}</span>
                        <span> ⋅ </span>
                        <span>回复 {{$topic->reply_count}}</span>
                        <span> ⋅ </span>
                        <span>查看 {{$topic->view_count}}</span>
                    </div>
                </div>
                <article class="article-body">
                    {!! $topic->body_parsed !!}
                </article>
                <div class="article-footer">

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <aside>
                <div class="card aside">
                    <h6 class="text-center">作者</h6>
                    <div class="card-body">
                        @include('users._user_heading', [ 'user' => $topic->user])
                        <div class="buttons text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary">关注</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">私信</button>
                        </div>
                    </div>
                </div>

                <div class="card aside">
                    <div></div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection


@section('script')
<script src="{{ asset('vendor/highlight/highlight.pack.js') }}"></script>
<script>
    $(function () {
        hljs.initHighlightingOnLoad();
    });
</script>
@endsection