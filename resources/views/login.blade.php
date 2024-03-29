<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{mix("css/app.css")}}" rel="stylesheet" />
        <script src="{{mix("js/login.js")}}" defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="referrer" content="no-referrer">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>

    <body>
        <div id="login"></div>
    </body>
</html>
