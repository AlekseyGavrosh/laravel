@extends ('layouts.public')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">

        <div class="block_edit_href">
            <a href="{!! route('articles') !!}">
                <mark class="article_read_title">Статьи на сайте</mark>
            </a>
        </div>

        <?php
        foreach($articles as $key => $article) {


            if (!empty($_GET['page'])) {
                $key += $_GET['page'] * 10 - 10;
            }
            ?>

            <div class="block_article_main">
                <a href="{!! route('articles.read', ['id' => $article->id]) !!}" class="read_article_main_page">Читать</a>
                <p class="subtitle_block_main">Название статьи:
                    <a href="{!! route('articles.read', ['id' => $article->id]) !!}">
                        <mark class="article_read_title">{{ $article->title }}</mark></a>
                </p>
                <p class="subtitle_block_main">Привязана к категории:
                    <span class="article_read_title">
            @if (!empty($article->title_categories))
                            <a href="">{{ $article->title_categories}}</a>.
                        @else
                            <a href="">Нету</a>.
                        @endif
        </span>
                </p>
                <p class="subtitle_block_main">Прикрипленные теги:
                    <span class="article_read_title">
            @if (!empty($articlesTag[$article->id]) && count($articlesTag[$article->id]) > 0)
                            @foreach($articlesTag[$article->id] as $key => $tag)
                                <a href="{!! route('linked.to.tag', ['id' => $tag->id]) !!}">{{$tag->name}}</a>
                                @if ($key != (count($articlesTag[$article->id]) -1)) ||
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
                    <p class="subtitle_block_main">Дата создания:
                        <mark class="article_read_title">{{$article->created_at }}</mark>
                    </p>
                    <p class="subtitle_block_main">Короткий текст статьи:
                        <mark class="article_read_title">{{ $article->short_text }}</mark>
                    </p>
                    <p class="subtitle_block_main">Полный текст статьи:</p>
                    <div class="full_text_article full_text_article_main_page">
                        <mark>{!!  $article->full_text !!}</mark>

                    </div>
                </div>

            </div>
        <?php
       }
       ?>

        {{ $articles->links() }}
    </main>
@stop
@section('js')

@stop
