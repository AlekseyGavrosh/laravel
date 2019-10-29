@extends ('layouts.admin')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактирование категории</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p> Ввведите  наименование категории</p>
            <br>
            <input type="text" name="title" class="form-control" value="{{$category->title}}">
            <p>Текст категории <br>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{!! $category->description !!}</textarea></p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Редактировать</button>
        </form>
    </main>
@stop
