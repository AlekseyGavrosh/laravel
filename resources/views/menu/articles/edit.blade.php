@extends ('layouts.public')
@section ('content')


    <script type="text/javascript" src="/inc/CKeditor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/inc/CKeditor/AjexFileManager/ajex.js"></script>

    <main class="article_edit col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="subtitle_block_main">Редактирование Статьи</h1>
        <form method="post">
            {!! csrf_field() !!}
            <p class="sub_subtitle">Выбор категории: </p>
            <select type="text" name="categories[]"
                    class="form-control select_category_article">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if (in_array($category->id, $arrCategories)) selected @endif>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>

            <p class="sub_subtitle">Какие теги к статье будут прикреплены :</p>
            <select name="tags[]" multiple id="tags_select">

                @foreach($arrTags as $key => $name)
                    <option value="{{$name}}"
                            title="{{$key}}"
                            selected="true"></option>
                @endforeach

            </select>
            <div id="block_add_Tags">

                @foreach($arrTags as $key => $name)
                    <div class="tags_div" title="{{$key}}">
                        <div class="name_tags">{{$name}}
                        </div>
                        <a class="tags_del_a" href="#" res="{{$key}}">
                            <img src="/public/img/iconk_del_tags.ico" class="tags_del_icon">
                        </a>
                    </div>
                @endforeach

            </div>
            <input type="text" list="guestlist" class="tags_input" id="textCommand" res="">
            <datalist id="guestlist">

                @foreach($tags as $tag)
                    <option class="data_option" value_id="{{$tag->id}}"
                            value="{{$tag->name}}">
                        {{$tag->name}}
                    </option>
                @endforeach

            </datalist>

            <p class="subtitle_block_main"> Название статьи</p>
            <input type="text" name="title" class="form-control input_text" required value="{{$article->title}}">
            <p class="subtitle_block_main">Автор:</p>
            <input type="text" name="author" class="form-control input_text" required value="{{$article->author}}">
            <p class="subtitle_block_main">Короткий текст: </p>
            <textarea name="short_text" id="" cols="100" rows="2">{{ $article->short_text }} </textarea>
            <p class="subtitle_block_main">Полный текст: </p>
            <textarea id="editor1" name="full_text" cols="100" rows="20"> {!! $article->full_text !!}</textarea>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right">Сохранить</button>
        </form>
    </main>
@stop
