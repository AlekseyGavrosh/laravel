@extends ('layouts.public')
@section ('content')

    <main class="article_edit col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h2>Добро пожалоловать на страницу смены пароля {{ Auth::user()->email }} </h2>

        <form method="post" style="width: 300px">
            {{ csrf_field() }}
            <div class="form-group" method="post">
                <label for="myPassword" class="reset_pass_label"> Старый Пароль</label>
                <input type="password" name="password" class="form-control reset_pass_input" placeholder="Старый Пароль"
                       required>
                <label for="myPassword" class="reset_pass_label"> Новый пароль</label>
                <input type="password" name="pass_new" class="form-control reset_pass_input" placeholder="Новый пароль"
                       required>
                <label for="myPassword" class="reset_pass_label">Повторите новый пароль</label>
                <input type="password" name="pass_new_sec" class="form-control reset_pass_input"
                       placeholder="Повторите новый пароль" required>

                <button type="submit" class="btn btn-primary">Сменить</button>
            </div>
        </form>

        @if (\Auth::user()->isAdmin == 1)
<<<<<<< HEAD
{{--            <a href="{{ route('admin') }}"> В админку</a>--}}
=======
            <a href="{{ route('admin') }}"> В админку</a>
>>>>>>> origin/feature_blog_laravel_1
        @endif
        <br>


        <a href={{ route('logout') }}>Выйти из аккаунта</a>
        <a href="{!! route('account') !!}"> Назад в Профиль ?</a>


    </main>

    <?php



    //$r = Auth::user();
    //dd($r);
    //?>

@stop
