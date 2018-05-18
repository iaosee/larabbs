<div class="user-replies">

    @if (count($replies))
    <ul class="list-group list-group-flush topics">
        @foreach ($replies as $reply)
            <li class="list-group-item list-group-item-action">
                <a href="{{ $reply->topic->link(['#reply' . $reply->id]) }}">
                    {{ $reply->topic->title }}
                </a>

                <div class="reply-content" style="margin: 6px 0;">
                    {!! $reply->content !!}
                </div>

                <div class="text-muted">
                    回复于 {{ $reply->created_at->diffForHumans() }}
                </div>
            </li>
        @endforeach
    </ul>
    @else
    <div class="empty-block">暂无数据 ~_~ </div>
    @endif

    <div class="page clearfix">
        <div class="page-wrap pull-right">
            {!! $replies->appends(Request::except('page'))->render() !!}
        </div>
    </div>

</div>