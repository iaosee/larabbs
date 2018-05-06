            <div class="topic-list">
                <ul class="list-unstyled">
                    @foreach( $topics as $topic )
                    <li class="media mb-2">
                        <div class="media-left" style="min-width: 7rem;">
                            <div class="user-avatar">
                                <a href="{{ route('users.show', [$topic->user->id]) }}"><img width="60" height="60" class="mr-3 media-object img-thumbnail" src="{{ $topic->user->avatar }}" alt="{{ $topic->user->name }}"></a>
                            </div>
                            <a href="{{ route('users.show', [$topic->user->id]) }}">{{ $topic->user->name }}</a>
                        </div>
                        <div class="card">
                            <div class="media-body">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between align-items-center">
                                        <a href="{{ route('topics.show', [$topic->id]) }}">{{ $topic->title }}</a>
                                        <span class="badge badge-info badge-pill pull-right">{{ $topic->reply_count }}</span>
                                    </h5>
                                    <p class="card-text">
                                        {{ $topic->title }}
                                        {{ substr($topic->body, 0, 300) }}
                                    </p>
                                    <div class="links text-right">
                                        <a href="#" class="card-link" title="{{ $topic->category->name }}">{{ $topic->category->name }}</a>
                                        <span> • </span>
                                        <span href="#" class="card-link text-secondary">{{ $topic->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="page">
                    {{ $topics->render() }}
                </div>
            </div>