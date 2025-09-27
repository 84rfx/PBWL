<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Perpustakaan</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#2563eb;"> {{-- biru modern --}}
            <div class="container">
                <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
                    📚 Perpustakaan
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side (kosong, karena Daftar Buku dipindah ke dropdown user) -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            {{-- Jangan tampilkan Login & Register di halaman login/register/lupa password --}}
                            @if (!request()->routeIs('login', 'register', 'password.request', 'password.email', 'password.reset'))
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white d-flex align-items-center"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">

                                    {{-- Tampilkan avatar user jika ada --}}
                                    @if (Auth::user()->avatar)
                                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar"
                                            class="rounded-circle me-2"
                                            style="width: 30px; height: 30px; object-fit: cover;">
                                    @else
                                        <span class="me-2">👤</span>
                                    @endif

                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        👤 Profil Saya
                                    </a>
                                    <a class="dropdown-item" href="{{ route('books.index') }}">
                                        📚 Daftar Buku
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        🚪 Logout
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
        <!-- End Navbar -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
