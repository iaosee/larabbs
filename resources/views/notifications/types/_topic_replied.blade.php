<div class="media">
    <div class="media-left text-center">
        <div class="avatar-box">
            <a class="" href="{{ route('users.show', $notification->data['user_id']) }}">
                <img class="rounded-circle img-responsive user-avatar" width="50" height="50" class="mr-3 media-object img-thumbnail" src="{{ $notification->data['user_avatar'] }}" alt="{{ $notification->data['user_name'] }}">
            </a>
        </div>
    </div>
    <div class="card">
        <div class="media-body">
            <div class="card-body">
                <div class="info">
                    <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
                    <span>评论了</span>
                    <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>

                    <span class="text-info pull-right" title="{{ $notification->created_at }}">
                        <span class="glyphicon glyphicon-clock" aria-hidden="true"></span>
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                </div>
                <p class="card-text mt-2">
                    {!! str_limit(strip_tags($notification->data['reply_content']), 150, '...') !!}
                </p>
            </div>
        </div>
    </div>
</div>
