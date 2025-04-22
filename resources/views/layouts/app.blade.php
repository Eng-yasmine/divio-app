<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        .active {
            font-weight: bold;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Div.io</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">Home</a>
                        </li>
                        @auth

                            <li class="nav-item @if (request()->is('posts*')) active @endif">
                                <a class="nav-link" href="{{ route('posts.view') }}">Posts</a>
                            </li>

                            <li class="nav-item @if (request()->is('users*')) active @endif">
                                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                            </li>

                            <li class="nav-item @if (request()->is('tags*')) active @endif">
                                <a class="nav-link" href="{{ route('tags.index') }}">Tags</a>
                            </li>



                        @endauth
                        <li class="nav-item @if (request()->is('ajax-tags*')) active @endif">
                            <a class="nav-link" href="{{ route('ajax-tags.index') }}">Ajax</a>
                        </li>

                    </ul>

                    <!-- Search Form -->
                    <form class="d-flex me-3" action="{{ route('posts.search') }}" role="search">
                        <input class="form-control me-2" name="q" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <!-- Right Side -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- لو حابة تضيفي لينك للبروفايل --}}
                                    {{-- <a class="dropdown-item" href="{{ route('profile') }}">Profile</a> --}}

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

        </main>

    </div>

    @yield('script')
</body>



</html>
