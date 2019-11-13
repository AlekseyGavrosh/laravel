@extends ('layouts.public')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1 class="stack_articles">Список статей</h1>
        @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
        <a href="{!! route('articles.add') !!}" class="btn btn-info">Добавить Статью</a>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Автор</th>
                <th>Категория</th>
                <th>Дата добавления</th>
                @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
                <th>Действия</th>
                    @endif
            </tr>
            <div class="container">
                @foreach($articles as $key => $article)
                    <?php
                    if (!empty($_GET['page']))
                        $key += $_GET['page'] * 10 -10;
                    ?>
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$article->title}}</td>
                        <td>{!! $article->author !!}</td>
                        <td>{!! $article->title_categories !!}</td>
                        <td>{{$article->created_at }}</td>
                        @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
                        <td><a href="{!! route('articles.read', ['id' => $article->id]) !!}">Читать</a> ||
                            <a href="{!! route('articles.edit', ['id' => $article->id]) !!}">Редактировать</a> ||
                            <a href="javascript:;" class="delete" rel="{{$article->id}}"> Удалить</a></td>
                            @endif
                    </tr>
                @endforeach
            </div>
        </table>
        {{ $articles->links() }}
    </main>
@stop
@section('js')

    <script type="text/javascript" src="/public/js/jquery-3.4.1.min.js"></script>
    <script>
      $(function () {
        $('.delete').on('click', function () {
          if (confirm('Вы действительно хотите удалить эту запись ? ')) {

            let id = $(this).attr('rel')

            $.ajax({
              type: 'DELETE',
              url: "{!! route('articles.delete') !!}",
              data: {_token: "{{csrf_token()}}", id: id},
              complete: function () {
                alert(' Удалено')
                location.reload()
              }
            })

          } else {
            alert(' Не удалено')
          }
        })

      })</script>
@stop
