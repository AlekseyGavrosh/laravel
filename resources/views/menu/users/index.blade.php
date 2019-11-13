@extends ('layouts.public')
@section ('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список пользователей</h1>

        <a href="{!! route('users.add') !!}" class="btn btn-info">Добавить Пользователя</a>

        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>email</th>
                <th>Роль</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            <div class="container">
                @foreach ($users as $key => $user)
                    <?php
                    if (!empty($_GET['page']))
                        $key += $_GET['page'] * 10 - 10;
                    ?>
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->isAdmin}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="{!! route('users.edit', ['id' => $user->id]) !!}">Редактировать</a> ||
                            <a href="javascript:;" class="delete" rel="{{$user->id}}"> Удалить</a></td>
                    </tr>
                @endforeach
            </div>
        </table>
        {{ $users->links() }}
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
              url: "{!! route('users.delete') !!}",
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
