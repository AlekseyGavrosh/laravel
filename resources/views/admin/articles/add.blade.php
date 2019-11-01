@extends ('layouts.admin')
@section ('content')

    <?php


    ?>
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Добавление Статей</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор категории: <br><select type="text" name="categories[]" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->title}}</option>
                        @endforeach
                </select></p>
            <p> Название статьи</p>
            <br>
            <input type="text" name="title" class="form-control" required>
            <p>Автор: <br>
                <input type="text" name="author" class="form-control" required></p>
            <p>Короткий текст: <br>
                <textarea name="short_text" id="" cols="100" rows="2"></textarea></p>

            <p>Полный текст: <br>
                <textarea name="full_text" id="" cols="100" rows="8"></textarea></p>

            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Добавить</button>
        </form>
    </main>
@stop
