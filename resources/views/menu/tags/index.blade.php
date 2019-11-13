@extends ('layouts.public')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список категорий</h1>

        <a href="{!! route('tags.add') !!}" class="btn btn-info">Добавить Tag</a>

        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Количество приязаных статей</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            <div class="container">
                @foreach ($tags as $key => $tag)
                    <?php
                    if (!empty($_GET['page']))
                        $key += $_GET['page'] * 10 - 10;
                    ?>
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->count_articles}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td><a href="{!! route('tags.edit', ['id' => $tag->id]) !!}">Редактировать</a> ||
                            <a href="javascript:;" class="delete" rel="{{$tag->id}}"> Удалить</a></td>
                    </tr>
                @endforeach
            </div>
        </table>
        {{ $tags->links() }}
    </main>
@stop
@section('js')

    <script>
      $(function () {
        $('.delete').on('click', function () {
          if (confirm('Вы действительно хотите удалить эту запись ? ')) {

            let id = $(this).attr('rel')

            $.ajax({
              type: 'DELETE',
              url: "{!! route('tags.delete') !!}",
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
