<h2>Добро пожалоловать, {{ Auth::user()->email }} </h2>
<br>
@if (\Auth::user()->isAdmin == 1)
    <a href="{{ route('admin') }}"> В админку</a>
    @endif
<a href={{ route('logout') }}>Выйти</a>

<?php



//$r = Auth::user();
//dd($r);
//?>
