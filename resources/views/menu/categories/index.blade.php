@extends ('layouts.public')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список категорий</h1>
        <br>
        @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
        <a href="{!! route('categories.add') !!}" class="btn btn-info">Добавить категорию</a>
        @endif
        {{ $categories->links() }}
        <table class="table table-bordered table_index_cat">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Родительская категория</th>
                <th>Количество привязанных записей</th>
                <th>Дата добавления</th>
                @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
                <th>Действия</th>
                @endif
            </tr>
            <div class="container">
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{!! $category->description !!}</td>
                        <td>{!! $category->parent_name !!}</td>
                        <td>{!! $category->count_articles !!}</td>
                        <td>{{$category->created_at}}</td>
                        @if (!empty(Auth::user()) && \Auth::user()->isAdmin == 1)
                        <td><a href="{!! route('categories.edit', ['id' => $category->id]) !!}">Редактировать</a> ||
                            <a href="javascript:;" class="delete" rel="{{$category->id}}"> Удалить</a></td>
                        @endif
                    </tr>
                @endforeach
            </div>
        </table>

        <script type="text/javascript" src="/public/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/public/js/second.js"></script>
        <script language="JavaScript">

          $(document).ready(function () {
            $('.topnav').accordion({
              accordion: true,
              speed: 500,
              closedSign: '[+]',
              openedSign: '[-]'
            })
          })

        </script>

        <div class="block_category_info">
            <p class="title_block">Иерархия категорий</p>
        <ul class="topnav">
            <?php
            echoCategory($accordion);
            function echoCategory($categories, $ul = false) {
            if ($ul) {
                echo '<ul>';
            }
            foreach ($categories as $category) {
            ?>
            <li><a href="#" data-id="<?=$category->id?>"><?=$category->title?>></a>
            <?php
            if (!empty($category->item)) {
                echoCategory($category->item, true);
            } else {
                echo "</li>";
            }
            }
            if ($ul) {
                echo '</ul>';
            }
            }
            ?>
        </ul>
            <p class="title_block">Список Тегов</p>
        <ul class="block_tags topnav">
            @foreach($tags as $tag)
                <li><a href="{!! route('linked.to.tag', ['id' => $tag->id]) !!}">{{$tag->name}}</a></li>
                @endforeach
        </ul>
        </div>
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
              url: "{!! route('categories.delete') !!}",
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
