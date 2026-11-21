<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tasks for Today' }}</title>
    <link rel="stylesheet" href="{{ asset('css/tsa3.css') }}">
</head>
<body>
    <header class="topbar">
        <a class="brand" href="{{ route('welcome') }}">TASKS <span>FOR TODAY</span></a>
        <nav aria-label="Main navigation">
            <a class="{{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Today</a>
            <a class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">All tasks</a>
            <a class="{{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
            <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            @auth
                <a class="{{ request()->routeIs('tasks.create') ? 'active' : '' }}" href="{{ route('tasks.create') }}">New task</a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">@csrf<button type="submit">Log out</button></form>
            @else
                <a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Log in</a>
                <a class="{{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>

    <main class="page-shell">
        @if (session('success')) <p class="success-message">{{ session('success') }}</p> @endif
        @yield('content')
    </main>
</body>
</html>
