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
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="title m-b-md">СОЗДАТЬ ТЕСТ</div>
                <p>Название теста: <input id="testname" type="text"></p>
            </div>
        </div>

        <div class="flex-center questionsContainer">
            <div id="questions">
            </div>
            <button id="btnCreateQuestion" type="button">Добавить вопрос</button>
        </div>

        <div class="flex-center position-ref">
            <div class="content main">
                <button class="btnMain btnSave" type="button">Сохранить</button>
                <button class="btnMain btnExit" type="button">Выход</button>
            </div>
            <div class="content askuser">
                <h3>Вы уверены? Внесенные данные не сохранятся!</h3>
                <button class="btnMain btnYes" type="button">Уверен, выйти!</button>
                <button class="btnMain btnNo" type="button">Нет, вернуться</button>
                <button class="btnMain btnSave" type="button">Сохранить</button>
            </div>
        </div>

    </body>
</html>
