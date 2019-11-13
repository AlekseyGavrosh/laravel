@extends ('layouts.public')
@section ('content')

    <main class="articles_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <div class="container-fluid mt-3">

            <form method="post" style="width: 300px">
                {{ csrf_field() }}
                <div class="form-group" method="post">
                    <label for="myEmail">Email</label>
                    <input type="email" id="myEmail" name="email" class="form-control" placeholder="Email">
                    <label for="myPassword">Пароль</label>
                    <input type="password" id="myPassword" name="password" class="form-control" placeholder="Пароль">
                    <p><input type="checkbox" name="remember"> Запомнить пароль ?</p>
                    <button type="submit" class="btn btn-primary">Авторизация</button>
                </div>
            </form>
        </div>
    </main>
@stop

