@extends ('layouts.public')
@section ('content')

    <main class="categories_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="subtitle_block_main">Добавление Категорий</h1>
        <form method="post">
            {!! csrf_field() !!}
            <p class="sub_subtitle">Выбор Родительской категории: </p>
            <select type="text" name="categories"
                    class="form-control select_category_article">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->title}}</option>
                @endforeach
            </select>
        <p class="subtitle_block_main"> Ввведите Название категории</p>
        <input type="text" name="title" class="form-control input_text" required>
        <p class="subtitle_block_main">Текст категории <p>
        <textarea name="description" id="" cols="100" rows="3"></textarea>
         <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Добавить</button>
        </form>
    </main>
@stop
