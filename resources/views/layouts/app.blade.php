<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title' , '')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .container {
            margin-top: 3px;
        }
        a{
            text-decoration: none;
            opacity: 0.8;
        }
        a:hover{
            opacity: 1;
        }
        .pr-12{
            margin-right: 1rem;
            display: block;
        }
        .btn-delete{
            background: url('/images/trash.svg');
            background-repeat: no-repeat;
            background-size: 1.1rem 1.1rem;
            padding-bottom: 0%;
            padding-top: 0%;
            padding-left: 0px;
            padding-right: 0px;
            outline: none;
            border: 0px;
            cursor: pointer;
            margin-right: 80px;
            width: 20px;
        }
        .checked{
            text-decoration: line-through;
            text-decoration-color: #3f4242;
            
        }
        .unchecked{
            color:rgb(233, 27, 27);
        }
        .cursor-pointer{
            cursor: pointer;
        }
        .custom-select{
            border-radius: 5px;
            width: 100px;
        }
        label{
            font-size: 1rem;
            padding-bottom: 3px;
        }
        .profile-img{
            margin: 1rem 0 1rem 0;
            border-radius: 50%;
        }
        .btn{
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
            transition: 0.2s;
        }
        .btn-lg{
        font-size: 1.125rem !important;
        }
        textarea{
            resize: none;
        }
        .title{
            font-size: 1.4rem;
            text-transform: capitalize;
            font-weight: bold;

        }
        .user-image{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 7px;
        }
        .dropdown-toggle::after{
            display: none;
        }


        
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/projects') }}">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <img class="user-image" src="{{ asset('/storage/' . auth()->user()->image) }}" alt="profile">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="/profile" class="dropdown-item">profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
            <div class="container">
                @yield('content')
            </div>
        </main>


    </div>
</body>
</html>
