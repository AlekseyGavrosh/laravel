@extends ('layouts.public')
@section ('content')

    <main class="articles_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="subtitle_block_main">Добавление Пользователя </h1>
        <form action="{!! route('users.add') !!}" method="post">
            {!! csrf_field() !!}
            <p class="sub_subtitle">Выбор роли: </p>
{{--            multiple--}}{{--   потом  добавится  для  возможности множества ролей , пока роль будет одна --}}
            <select type="text" name="roles"
                    class="form-control select_category_article">
                @foreach($roles as $role)
                    <option value="{{$role->id}}"> {{$role->name}}</option>
                @endforeach
            </select>

            <p class="subtitle_block_main">Имя пользователя</p>
            <input type="text" name="name" class="form-control input_text" required>
            <p class="subtitle_block_main">email пользователя</p>
            <input type="text" name="email" class="form-control input_text" required>
            <p class="subtitle_block_main">Пароль нового пользователя</p>
            <input type="text" name="password" class="form-control input_text" required placeholder="пароль">
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Добавить</button>
        </form>
    </main>
@stop
