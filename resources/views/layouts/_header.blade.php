
<header class="wrap-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">LaraBBS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">首页</a>
                    </li>
                </ul>
                @if( Auth::check() )
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">用户列表</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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