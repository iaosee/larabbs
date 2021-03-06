@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/simplemde/simplemde.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/highlight/monokai.css') }}">
@endsection

@section('content')
<section>
    <div class="error-info">
        @include('shared._errors')
    </div>
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
                <article class="article-body markdown-style">
                    {!! $topic->body_parsed !!}
                </article>
                <div class="article-footer">

                </div>
            </div>

            <div class="article-reply">
                @includeWhen(Auth::check(), 'topics._reply_form', ['topic' => $topic])
                @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
            </div>
        </div>
        <div class="col-md-3">
            <aside>
                @can('update', $topic)
                <div class="card aside">
                    <div class="buttons text-center">
                        <a href="{{route('topics.edit', $topic->id)}}" class="d-inline">
                            <button type="button" class="btn btn-sm btn-primary"><i class="icon iconfont icon-edit"></i> 编辑</button>
                        </a>
                        <form action="{{ route('topics.destroy', $topic->id) }}" method="post" class="d-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"><i class="icon iconfont icon-delete"></i> 删除</button>
                        </form>
                    </div>
                </div>
                @endcan
                <div class="card aside">
                    <h6 class="text-center">作者</h6>
                    <div class="card-body">
                        @include('users._user_heading', [ 'user' => $topic->user])
                        <div class="buttons text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary"><i class="icon iconfont icon-favorites"></i> 关注</button>
                            <button type="button" class="btn btn-sm btn-outline-info"><i class="icon iconfont icon-email"></i> 私信</button>
                        </div>
                    </div>
                </div>
                <div class="card aside">
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
                </div>
                @if (count($links))
                <div class="card aside">
                    <div class="h6 text-center">资源推荐</div>
                    <ul class="list-group list-group-flush">
                        @foreach ($links as $link)
                        <li class="list-group-item">
                            <a class="" href="{{ $link->link }}">
                                <span>{{ $link->title }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </aside>
        </div>
    </div>
</section>
@endsection


@section('script')

<script type="text/javascript" src="{{ asset('vendor/simplemde/simplemde.min.js') }}"></script>
<script src="{{ asset('vendor/highlight/highlight.pack.js') }}"></script>
<script>

    $(document).ready(function () {

        // hljs.initHighlightingOnLoad();

        // fix bug
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });

        var simplemde = new SimpleMDE({
            element: document.querySelector('#editor'),
            toolbar: false
        });


        $(location.hash).addClass('flicker');

    });

</script>
@endsection
