<?php

use Illuminate\Support\Facades\Route;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>Корпоративный портал
<<<<<<< HEAD
=======

>>>>>>> origin/feature_blog_laravel_1
        <?php
        if (!empty($main)) {
            echo $main;
        }
        ?>
    </title>

    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/js/bootstrap.js.map"></script>
<<<<<<< HEAD
    <script type="text/javascript" src="/public/js/jquery-3.4.1.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
=======
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
>>>>>>> origin/feature_blog_laravel_1
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="/inc/CKeditor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/inc/CKeditor/AjexFileManager/ajex.js"></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
=======
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
>>>>>>> origin/feature_blog_laravel_1
    <script src="/public/js/bootstrap.js"></script>
    <script src="/public/js/bootstrap_second.js"></script>
    <script src="/public/js/main.js"></script>
    <script src="/public/js/modernizr.js"></script>
<<<<<<< HEAD
=======
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
>>>>>>> origin/feature_blog_laravel_1
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <?php

//    $currentAction = explode('@', Route::currentRouteAction());
//    if (file_exists(public_path('css/' . $currentAction[1] . '.css'))) {
//        var_dump(' подключение');
//        var_dump(session()->get('success'));
//    echo "<link href=" . "/public/css/" . $currentAction[1] . ".css" . ' rel="stylesheet">';
//        }
//    else {
//    }

    ?>

    <link href="/public/css/main.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse navbar-expand-lg navbar-light bg-light fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{!! route('main') !!}">Главная</a>

    <div class="collapse navbar-collapse " id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Тут вторая ссылка <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Настройки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Всякие другие настройки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <?php
<<<<<<< HEAD
            if (!empty(Auth::user())) {
=======
            use Illuminate\Support\Facades\Route;if (!empty(Auth::user())) {
>>>>>>> origin/feature_blog_laravel_1
            ?>
            <li class="nav-item"><a href="{!! route('account') !!}" class="nav-link">Добро
                    пожалоловать, {{ Auth::user()->email }} </a></li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route('logout') !!}">Выйти</a>
            </li>
            <h4> Вы Админ ?  </h4>
            <?php if (\Auth::user()->isAdmin) {
                echo '   Да';
            }
            else {
<<<<<<< HEAD
                echo '   НЕТ';
            }
            ?>
            <a href="">{{\Auth::user()->isAdmin}}</a>
            <?php
            }
            else {
=======
>>>>>>> origin/feature_blog_laravel_1
            ?>
            <div class="main-nav">
                <li class="nav-link nav-item"><a class="cd-signin" href="#0">Вход</a>
                </li>
                <li class="nav-link nav-item"><a class="cd-signup" href="#0">Регистрация</a>
                </li>
            </div>
            <?php } ?>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link subtitle_menu_left" href="{!! route('categories') !!}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link subtitle_menu_left" href="{!! route('articles') !!}">Статьи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link subtitle_menu_left" href="{!! route('tags') !!}">Теги</a>
                </li>
                @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link subtitle_menu_left" href="{!! route('users') !!}">Пользователи</a>
                </li>
                @endif
                <li class="nav-item">
=======
>>>>>>> origin/feature_blog_laravel_1
                    <a class="nav-link subtitle_menu_left" href="{!! route('clear') !!}">Очистить кеш</a>
                </li>
            </ul>
        </nav>
        @yield('content')
    </div>
</div>


@yield('js')

@include('inc.messages')
@include('inc.auth')

</header>


</body>
</html>
