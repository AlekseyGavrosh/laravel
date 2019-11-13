@extends ('layouts.public')
@section ('content')

    <main class="tags_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="subtitle_block_main">Добавление Tag</h1>
        <form method="post">
            {!! csrf_field() !!}
            <p class="sub_subtitle"> Ввведите Название Tag</p>
            <input type="text" name="title" class="form-control">
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Добавить</button>
        </form>
    </main>
@stop
