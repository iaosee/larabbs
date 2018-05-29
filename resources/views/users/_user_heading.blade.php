                        <div class="text-center user-heading">
                            <div class="avatar-wrap">
                                <a href="{{ route('users.show', $user) }}"><img class="rounded-circle img-responsive user-avatar" src="{{ $user->avatar }}" /></a>
                            </div>
                            <h1 class="h4">
                                <small class="text-info">@</small>
                                <a href="{{ route('users.show', $user) }}"><span class="text-success user-name">{{ $user->name }}</span></a>
                            </h1>
                            <p><a href="mailto: {{ $user->email }}">{{ $user->email }}</a></p>
                        </div>