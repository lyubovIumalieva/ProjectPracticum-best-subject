<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Styles and Scripts -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    СИСТЕМА ТЕСТИРОВАНИЯ
                </div>

                <div class="links">
                    <a href="/newtest">Создать тест</a>
                </div>

                <div class="links">
                    <p>Выполнил: Карнаухов М. Н.</p>
                </div>
            </div>
        </div>
    </body>
</html>
