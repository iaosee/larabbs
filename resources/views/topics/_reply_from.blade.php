<div class="add-reply">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <ul class="list-unstyled topic-list">
        <li class="media mb-2">
            <div class="media-left">
                <div class="user-avatar">
                    <a href="{{ route('users.show', [$topic->user->id]) }}"><img width="60" height="60" class="mr-3 media-object img-thumbnail" src="{{ $topic->user->avatar }}" alt="{{ $topic->user->name }}"></a>
                </div>
                <a href="{{ route('users.show', [$topic->user->id]) }}">{{ $topic->user->name }}</a>
            </div>
            <div class="card">
                <div class="media-body">
                    <div class="card-body">
                        <p class="card-text">
                            {{ str_limit(strip_tags($topic->body_parsed), 300, '...') }}
                        </p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>