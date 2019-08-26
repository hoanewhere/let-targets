<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>目標一覧</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header class="header">
        <div class="header-container p-1">
            <div class="header-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}"></a>
            </div>
            <nav class="header-nav">
                <ul>
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li><a href="">{{ __('MyPage') }}</a></li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <!-- main -->
    <main class="main">
        @yield('content')      
    </main>

    <!-- footer -->
    <footer>

    </footer>
</body>
</html>