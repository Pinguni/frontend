<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Pinguni') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    @yield('head')
</head>
<body>
    <div id="app">
        <nav id="nav-main">
            <div id="nav-left">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Pinguni') }}
                </a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @endauth
                    <li>
                        <a href="{{ url('/') }}">Community</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Guides</a>
                    </li>
                    <li>
                        <a href="{{ route('courses.index') }}">Courses</a>
                    </li>
                </ul>
            </div>

            <div id="nav-right">
                <ul>
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        @yield('content')

        <footer>
            <p>Copyright &copy; 2021 <a href="https://cathzchen.com" target="_blank">Catherine Chen</a>.  All Rights Reserved.</p>
        </footer>

        @yield('scripts')
    </div>
</body>
</html>
