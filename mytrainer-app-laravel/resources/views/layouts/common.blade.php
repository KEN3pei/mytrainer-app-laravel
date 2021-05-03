<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- bootstrap4 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>

    <body>
        <div class="hide-popup" id="hidden-section">
            <div class="popup">
                <div class="popup-form">
                <i class="fas fa-times" id="close-icon"></i>
                <form action="/top" method="POST">
                    @csrf
                    <input type="text" name="listName" placeholder="create list name"></br>
                    <button type="submit" value="リスト名">OK!</button>
                </form>
                </div>
            </div>
        </div>
        <header>
            <div class="head-section">
                <a href="/top">top</a>
                <a href="/search">search</a>
                <a href="/setting"><i class="far fa-user icon"></i></a>
            </div>
        </header>
        <div class="top-of-sidebar"></div>
        <div class="sidebar">
            <div class="menulist">▽ メニューリスト</div>
            @foreach($lists as $list)
                <p><a href="/top/menulist?listname={{ $list->list_name }}">{{ $list->list_name }}</a></p>
            @endforeach
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>