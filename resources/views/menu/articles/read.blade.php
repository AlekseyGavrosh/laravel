@extends ('layouts.public')
@section ('content')

    <main class="articles_add col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <div class="block_article_page_article">
            <div class="block_edit_href">
                <a href="{!! route('articles.edit', ['id' => $article->id]) !!}">
                    <mark class="article_read_title">Редактировать</mark>
                </a>
            </div>
            <div class="block_info_article">
                <p class="subtitle_block_main">Название статьи:</p>
                <mark class="article_read_title">{{ $article->title }}</mark>
            </div>
            <div class="block_info_article">
                <p class="subtitle_block_main">Привязана к категории:</p>
                <span class="article_read_title">
            @if (!empty($article->cateroryTitle))
                        <a href="">{{ $article->cateroryTitle}}</a>
                    @else
                        <a href="">Нету</a>.
                    @endif
        </span>
            </div>
            <div class="block_info_article">
                <p class="subtitle_block_main">Прикрипленные теги:</p>
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
            </div>
            <div class="block_info_article">
                <p class="subtitle_block_main">Автор: </p>
                <mark class="article_read_title">{{$article->author}}</mark>
            </div>
            <div class="block_info_article">
                <p class="subtitle_block_main">Короткий текст статьи:</p>
                <mark class="article_read_title">{{ $article->short_text }}</mark>
            </div>
            <div class="block_info_article block_full_text">
                <p class="subtitle_block_main">Полный текст статьи:</p>
                <div class="full_text_article">
                    <mark>{!!  $article->full_text !!}</mark>
                </div>
            </div>
        </div>


        <?php
        if (!empty($comments) && count($comments) > 0) { ?>

        <div class="block_info_article block_comments">
            <p class="subtitle_block_comment">Комментарии </p>
            @foreach($comments as $key => $comment)

                <div class="block_comment">
                    <div class="block_info_comment" par="379925" data-block="comm" data-id="468036">
                        <div class="block_time_comment">02.03.2020 18:31</div>
                        <div class="block_rate_comment">
                            <span class="minus">{{$comment['minus']}}</span>
                            <span class="plus">{{$comment['plus']}}</span>
                        </div>
                    </div>
                    <div class="block_comment_user_and_info">
                        <div class="block_info_user_comment">
                            <mark class="article_read_title">{{$comment['user']['name']}}</mark>
                            <div class="comm_num" title="Ссылка на сообщение">
                                <a href="/?l=379925&amp;m=468036">№"2</a>
                            </div>
                            <div class="in-l ava">
                                <img src="https://vpk.name/u/3591.jpg">
                            </div>
                            <div class="in-l">
                                <div class="user_info"><a
                                        href="https://vpk.name/user/3591/">{{$comment['user']['name']}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="block_text_comment">
                            <div class="quote">{{$comment['comment']}}</div>

                            <div class="foot">
                                <div class="in-r mark bt_mark"></div>

                                <div class="in-r"><a href="https://vpk.name/login">Сообщить</a></div>
                            </div>
                        </div>
                    </div>
                </div>



            @endforeach
        </div>
        <?php } ?>
    </main>
    </div>
@stop
