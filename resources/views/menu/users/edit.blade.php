@extends ('layouts.public')
@section ('content')

    <main class="articles_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="subtitle_block_main">Редактирования Пользователя </h1>
        <form method="post">
            {!! csrf_field() !!}
            <p class="sub_subtitle">Выбор роли: </p>
{{--            multiple--}}{{--   потом  добавится  для  возможности множества ролей , пока роль будет одна --}}
            <select type="text" name="roles"
                    class="form-control select_category_article">
                @foreach($roles as $role)
                    <option value="{{$role->role}}"> {{$role->name}}</option>
                @endforeach
            </select>

            <p class="subtitle_block_main">Имя пользователя</p>
            <input type="text" name="name" class="form-control input_text" value="{{$user->name}}">

            <p class="subtitle_block_main">email пользователя</p>
            <input type="text" name="email" class="form-control input_text" value="{{$user->email}}" required>

            <p class="subtitle_block_main">Пароль пользователя</p>
            <input type="text" name="password" class="form-control input_text" value="{{$user->password}}" required>
            <h7> Введите новый пароль от 6 символов до 20 и он перезапишется, этот удалится</h7>


            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Редактировать</button>
        </form>
    </main>
@stop
