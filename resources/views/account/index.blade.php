@extends ('layouts.public')
@section ('content')

    <main class="article_edit col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <h2>Добро пожалоловать, {{ Auth::user()->email }} </h2>

    @if (\Auth::user()->isAdmin == 1)
        <a href="{{ route('admin') }}"> В админку</a>
    @endif
    <a href={{ route('logout') }}>Выйти из аккаунта</a>
        <a href="{!! route('change_password') !!}"> Поменять пароль ?</a>


</main>

<?php



//$r = Auth::user();
//dd($r);
//?>

@stop
