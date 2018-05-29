            <div class="topic-list">
                <ul class="list-unstyled">
                    @foreach( $topics as $topic )
                    <li class="media mb-2">
                        <div class="media-left text-center">
                            <div class="user-avatar">
                                <a href="{{ route('users.show', [$topic->user->id]) }}">
                                    <img width="60" height="60" class="media-object img-thumbnail rounded-circle img-responsive user-avatar" src="{{ $topic->user->avatar }}" alt="{{ $topic->user->name }}">
                                </a>
                            </div>
                            <p class="">
                                <a href="{{ route('users.show', [$topic->user->id]) }}">{{ $topic->user->name }}</a>
                            </p>
                        </div>
                        <div class="card">
                            <div class="media-body">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between align-items-center">
                                        <a class="topic-title" href="{{ $topic->link() }}">{{ $topic->title }}</a>
                                        <span class="badge badge-info badge-pill pull-right">{{ $topic->reply_count }}</span>
                                    </h5>
                                    <p class="card-text">
                                        {{ $topic->title }}
                                        {{ str_limit(strip_tags($topic->body_parsed), 300, '...') }}
                                    </p>
                                    <div class="links text-right">
                                        <a href="{{ route('categories.show', $topic->category->id) }}" class="card-link" title="{{ $topic->category->name }}">{{ $topic->category->name }}</a>
                                        <span> • </span>
                                        <span href="#" class="card-link text-secondary">{{ $topic->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="page clearfix">
                    <div class="page-wrap pull-right">
                        {{ $topics->render() }}
                    </div>
                </div>
            </div>