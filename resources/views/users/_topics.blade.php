<div class="user-topics">
    <ul class="list-group list-group-flush topics">
        @foreach ($topics as $topic)
        <li class="list-group-item list-group-item-action">
            <a href="{{ $topic->link() }}" >{{ $topic->title }}</a>
            <span class="pull-right">
                {{ $topic->reply_count }} 回复
                    <span> ⋅ </span>
                {{ $topic->created_at->diffForHumans() }}
            </span>
        </li>
        @endforeach
    </ul>

    <div class="page clearfix">
        <div class="page-wrap pull-right">
            {{ $topics->render() }}
        </div>
    </div>
</div>