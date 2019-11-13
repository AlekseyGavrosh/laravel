@if(session()->has('success'))
    <script type="text/javascript">
      $(function () {
        alert(" {!! session()->get('success') !!} ");
      })
    </script>
@elseif (session()->has('errors'))
    <script type="text/javascript">
      $(function () {
        alert({!! session()->get('errors') !!})
      })
    </script>

    <?php    $errors = session()->get('errors');  $messages = '';
    ob_start();
    var_dump($errors);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'dump_errors.txt', ob_get_clean());
    ?>
    @if(is_array($errors))
    @foreach($errors->all("<p>:message</p>") as $message)
        <?php $messages .= $message ?>
    @endforeach
    @elseif(is_string($errors))
        <?php
        $messages = $errors;
        ?>
    @endif
    <script type="text/javascript">
      $(function () {
        alert(" {!! $messages !!} ");
      })
    </script>

@endif
