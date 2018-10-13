<div class="reply-list">
    @if( count($replies) )
    <h5 class="title text-center">评论({{ count($replies) }})</h5>
    @else

    @endif
    <ul class="list-unstyled">
        @foreach ($replies as $index => $reply)
        <li class="media reply-item" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="media-left text-center">
                <div class="avatar-box">
                    <a class="" href="{{ route('users.show', [$reply->user_id]) }}">
                        <img class="rounded-circle img-responsive user-avatar" width="50" height="50" class="mr-3 media-object img-thumbnail" src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}">
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="media-body">
                    <div class="card-body">
                        <div class="info">
                            <a class="" href="{{ route('users.show', [$reply->user_id]) }}">{{ $reply->user->name }}</a>
                            <span> • </span>
                            <span class="text-muted" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="card-text reply-content">
                            <!-- {*!! $reply->content !!*} -->
                            {!! $reply->content_parsed ?? $reply->content !!}
                        </div>
                        <div class="links text-right">
                            <!-- <form class="d-inline" > -->
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-sm ">
                                    <i class="icon iconfont icon-good"></i>
                                </button>
                            <!-- </form> -->
                            @can('destroy', $reply)
                            <form class="d-inline" action="{{ route('replies.destroy', $reply->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default btn-sm text-danger">
                                    <i class="icon iconfont icon-delete"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>