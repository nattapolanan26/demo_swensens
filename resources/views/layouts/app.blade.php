<link
    href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600;700&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap"
    rel="stylesheet">
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://swensens1112.com/dist/common.a.css?v=1649528066"> --}}
    <link rel="stylesheet" href="https://swensens1112.com/css/style.css?v=1649514343">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://swensens1112.com/dist/common.a.css?v=1649514343"> --}}
    {{-- <link rel="stylesheet" href="https://swensens1112.com/css/slick-theme.css?v=1649514343"> --}}

</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <div class="header py-3">
            <div class="container mx-auto">
                <div class="wrapper">
                    <div class="header-l">
                        <div class="flex justify-start">
                            <a href="#" class="login-menu top_margin" id="login_">
                                เรื่องราวของสเวนเซ่นส์
                            </a>
                        </div>
                    </div>
                    <div class="logo">
                        <a href=" / ">
                            <img src="{{ asset('images/logo.png') }}" class="nav-img">
                        </a>
                    </div>
                    <div class="header-r">
                        <div class="flex justify-end">
                            @guest
                                {{-- <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                <a href="{{ route('login') }}" class="login-menu top_margin" id="login_">
                                    <img src="{{ asset('images/iconregister.png') }}" class="icon_footer font-login">
                                    เข้าสู่ระบบ
                                </a>
                                {{-- @if (Route::has('register'))
                                    <a class="no-underline hover:underline"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif --}}
                            @else
                                <span>{{ Auth::user()->name }}</span>

                                <a href="{{ route('logout') }}" class="no-underline hover:underline"
                                    onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>
</body>

</html>
