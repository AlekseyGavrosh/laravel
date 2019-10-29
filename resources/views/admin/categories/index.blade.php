@extends ('layouts.admin')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список категорий</h1>
        <br>

        <a href="{!! route('categories.add') !!}" class="btn btn-info">Добавить категорию</a>

        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($categories as $category)
                <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{!! $category->description !!}</td>
            <td>{{$category->created_at->format('d-m-Y H:i') }}</td>
        <td><a href="{!! route('categories.edit', ['id' => $category->id]) !!}">Редактировать</a> || <a href=""> Удалить</a></td>
                </tr>
                @endforeach

        </table>
    </main>
{{--@stop--}}
