<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>جمعية الايتام</title>

    @vite(['resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto"></ul>

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
                        <ul class="navbar-nav">

                            <!-- قائمة ادارة المستخدمين -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ادارة المستخدمين
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">ادارة المستخدمين</a></li>
                                    <li><a class="dropdown-item" href="{{ route('roles.index') }}">ادارة الصلاحيات</a></li>
                                </ul>
                            </li>

                            <!-- قائمة ثوابت النظام -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ثوابت النظام
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('governorate.index') }}">المحافظات</a></li>
                                    <li><a class="dropdown-item" href="{{ route('city.index') }}">المدن</a></li>
                                    <li><a class="dropdown-item" href="{{ route('district.index') }}">الأحياء</a></li>
                                </ul>
                            </li>

                            <!-- قائمة تقارير واستمارات -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    تقارير واستمارات
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">تقرير 1</a></li>
                                    <li><a class="dropdown-item" href="#">تقرير 2</a></li>
                                </ul>
                            </li>

                            <!-- قائمة استعلامات -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    استعلامات
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">استعلام 1</a></li>
                                    <li><a class="dropdown-item" href="#">استعلام 2</a></li>
                                </ul>
                            </li>

                            <!-- قائمة مستحقات الأيتام -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    مستحقات الأيتام
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">مستحقات يتيم</a></li>
                                    <li><a class="dropdown-item" href="#">استلام مبلغ</a></li>
                                </ul>
                            </li>

                            <!-- رابط جدول الموظفين -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('orphan.index')}}">الايتام</a>
                            </li>


                        </ul>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
