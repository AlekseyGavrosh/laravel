@extends ('layouts.public')
@section ('content')

    <main class="articles_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="subtitle_block_main">Добавление Статей </h1>
        <form method="post">
            {!! csrf_field() !!}
            <p class="sub_subtitle">Выбор категории: </p>
            <select type="text" name="categories[]"
                    class="form-control select_category_article">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->title}}</option>
                @endforeach
            </select>
            <p class="sub_subtitle">Какие теги к статье будут прикреплены :</p>
            <select name="tags[]" multiple id="tags_select">
            </select>
            <div id="block_add_Tags">
            </div>
            <input type="text" list="guestlist" class="tags_input" id="textCommand" res="">
            <datalist id="guestlist">

                @foreach($tags as $tag)
                    <option class="data_option" value="{{$tag->name}}">
                        {{$tag->name}}
                    </option>
                @endforeach

            </datalist>
            <p class="subtitle_block_main"> Название статьи</p>
            <input type="text" name="title" class="form-control input_text" required>
            <p class="subtitle_block_main">Автор: </p>
            <input type="text" name="author" class="form-control input_text" required>
            <p class="subtitle_block_main">Короткий текст: </p>
            <textarea name="short_text" id="" cols="100" rows="2"></textarea>
            <p class="subtitle_block_main">Полный текст: </p>
            <textarea name="full_text" id="editor1" cols="100" rows="8"></textarea>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Добавить</button>
        </form>
    </main>
@stop
