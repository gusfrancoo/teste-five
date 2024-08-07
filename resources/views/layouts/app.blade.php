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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: rgb(75 75 75)">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="color: white">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: white">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: white">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (auth()->user()->hasRole('admin') || auth()->user()->can('approve files'))

                                @if(request()->is('home'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('files')}}" style="color: white">Aprovar Arquivos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('view-files')}}" style="color: white">Visualizar Arquivos</a>
                                    </li>
                                @elseif(request()->is('files'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('home')}}" style="color: white">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('view-files')}}" style="color: white">Visualizar Arquivos</a>
                                    </li>
                                @elseif(request()->is('view-files'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('home')}}" style="color: white">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('files')}}" style="color: white">Aprovar Arquivos</a>
                                    </li>
                                @endif
                            @else
                                @if (request()->is('view-files') && !auth()->user()->can('approve files'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('files')}}" style="color: white">Home</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('view-files')}}" style="color: white">Visualizar Arquivos</a>
                                    </li>
                                @endif
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: rgb(75 75 75)">
                                    <a class="dropdown-item" style="color: white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
</body>
</html>

<style scoped>
.dropdown-item:hover {
    background-color: #ff5733 !important; /* Cor de fundo ao passar o mouse */
    color: #ffffff !important; /* Cor do texto ao passar o mouse */
}
.nav-link:hover{
    background-color: #ff5733 !important; /* Cor de fundo ao passar o mouse */
    color: #ffffff !important; /* Cor do texto ao passar o mouse */
}

</style>
