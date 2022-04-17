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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH6XH9p6lCbkrmlMXn-_8NF_5QfZIBzyo&callback=initGeoLocation&language=th&region=TH&sensor=true&libraries=places"
        type="text/javascript"></script>
    <script src="https://www.swensens1112.com/mailtip/jquery.mailtip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://swensens1112.com/dist/common.a.css?v=1649528066"> --}}
    {{-- <link rel="stylesheet" href="https://swensens1112.com/dist/common.a.css?v=1649514343"> --}}
    <link rel="stylesheet" href="https://swensens1112.com/css/style.css?v=1649514343">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://swensens1112.com/css/slick-theme.css?v=1649514343">
    <link rel="stylesheet" href="https://www.swensens1112.com/mailtip/mailtip.css" />
    <style>
        a:hover {
            color: rgba(250, 250, 250, 0.913);
            text-decoration: none;
        }

    </style>
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <div class="header-inner is-fixed has-nav py-2 border_mobile">
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
                                {{-- <div class="h-screen bg-gray-200 flex justify-center items-center dark:bg-gray-500"> --}}
                                <div x-data="{ open: false }" class="justify-center items-center">
                                    <div @click="open = !open" class="relative border-b-4 border-transparent"
                                        :class="{'border-indigo-700 transform transition duration-300 ': open}"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100">
                                        <div class="flex justify-center items-center space-x-3 cursor-pointer">
                                            <div class="w-8 h-8 rounded-full overflow-hidden">
                                                <img src="{{ asset('/images/profile-icon.png') }}" alt=""
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <div class="dark:text-white text-gray-900 text-lg">
                                                <div class="cursor-pointer">{{ Auth::user()->name }}</div>
                                            </div>
                                        </div>
                                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="absolute w-40 px-3 py-3 dark:bg-gray-800 bg-red-700 rounded-lg shadow border dark:border-transparent mt-1">
                                            <ul class="space-y-3 dark:text-white">
                                                <li class="font-medium">
                                                    <a href="#"
                                                        class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-white">
                                                        <div class="mr-3">
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        บัญชีของฉัน
                                                    </a>
                                                </li>
                                                <li class="font-medium">
                                                    <a href="#"
                                                        class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-white">
                                                        <div class="mr-3">
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                                </path>
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        ตั้งค่า
                                                    </a>
                                                </li>
                                                <hr class="dark:border-gray-700">
                                                <li class="font-medium">
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                        class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-white">
                                                        <div class="mr-3 text-white">
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        ออกจากระบบ
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

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
