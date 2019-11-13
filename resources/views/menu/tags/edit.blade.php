@extends ('layouts.public')
@section ('content')

    <main class="tags_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактирование Тега</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p> Ввведите название Тега</p>
            <br>
            <input type="text" name="title" class="form-control" value="{{$tag->name}}">
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Редактировать</button>
        </form>
    </main>
@stop
