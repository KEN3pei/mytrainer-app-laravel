<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <header>
            <div class="head-section">
                <a href="/home">home</a>
                <a href="/search">search</a>
                <i class="far fa-user icon"></i>
            </div>
        </header>
        <div class="top-of-sidebar"></div>
        <div class="sidebar">
            <div class="menulist">▽ メニューリスト</div>
            <p>name</p>
            <p>name</p>
            <p>name</p>
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </body>
</html>