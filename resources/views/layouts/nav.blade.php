<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav navbar-expand-md">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
            <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts</a>
            <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a>
            <a class="nav-link" href="#">New hires</a>
            <a class="nav-link" href="#">About</a>
            
            <div class="navbar-nav ml-auto">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('posts.create') }}">Dodaj novu objavu</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                
            </div>
        </nav>
    </div>
</div>