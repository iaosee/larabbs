
<header class="wrap-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">LaraBBS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}">首页</a></li>
                    <li class="nav-item {{ Request::path() == 'topics' ? 'active' : '' }}"><a class="nav-link" href="{{ route('topics.index') }}">话题</a></li>
                    <li class="nav-item {{ Request::path() == 'categories/1' ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">分享</a></li>
                    <li class="nav-item {{ Request::path() == 'categories/2' ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">教程</a></li>
                    <li class="nav-item {{ Request::path() == 'categories/3' ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">问答</a></li>
                    <li class="nav-item {{ Request::path() == 'categories/4' ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">公告</a></li>
                </ul>
                @if( Auth::check() )
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics.create') }}" data-toggle="tooltip" data-placement="top" title="发布文章"> <i class="icon iconfont icon-survey1"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifications.index') }}">
                            <span class="badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'success' : 'secondary' }} "  data-toggle="tooltip" data-placement="top" title="消息提醒">{{ Auth::user()->notification_count }}</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle username" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img width="20" height="20" class="rounded-circle avatar img-responsive" src="{{ config('app.url') . Auth::user()->avatar }}" alt="user avatar" />
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">个人中心</a>
                            <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">编辑资料</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <form method="POST" action="{{ route('logout') }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-block btn-sm btn-warning">退出</button>
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
                @else
                <form class="form-inline btns">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success">登录</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-outline-primary">注册</a>
                </form>
                @endif
            </div>
        </div>
    </nav>
</header>