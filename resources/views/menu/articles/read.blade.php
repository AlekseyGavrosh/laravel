@extends ('layouts.public')
@section ('content')

    <main class="articles_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">

        <div class="block_edit_href">
            <a href="{!! route('articles.edit', ['id' => $article->id]) !!}">
                <mark class="article_read_title">Редактировать</mark>
            </a>
        </div>

        <p class="subtitle_block_main">Название статьи:
            <mark class="article_read_title">{{ $article->title }}</mark>
        </p>
        <p class="subtitle_block_main">Привязана к категории:
            <span class="article_read_title">
            @if (!empty($article->cateroryTitle))
                        <a href="">{{ $article->cateroryTitle}}</a>
                @else
                    <a href="">Нету</a>.
                @endif
        </span>
        </p>

        <p class="subtitle_block_main">Прикрипленные теги:
        <span class="article_read_title">
            @if (!empty($arrTags) && count($arrTags) > 0)
                @foreach($arrTags as $key => $tag)
                    <a href="{!! route('linked.to.tag', ['id' => $tag->id]) !!}">{{$tag->name}}</a>
                    @if ($key != (count($arrTags) -1)) ||
                    @else .
                    @endif
                @endforeach
            @else
                <a href="">Нету</a>.
            @endif
        </span>
        </p>

        <div class="block_article_page_article">
            <p class="subtitle_block_main">Автор:
                <mark class="article_read_title">{{$article->author}}</mark>
            </p>
            <p class="subtitle_block_main">Короткий текст статьи:
                <mark class="article_read_title">{{ $article->short_text }}</mark>
            </p>
            <p class="subtitle_block_main">Полный текст статьи:</p>
            <div class="full_text_article">
                <mark>{!!  $article->full_text !!}</mark>

            </div>
        </div>


    </main>
@stop
