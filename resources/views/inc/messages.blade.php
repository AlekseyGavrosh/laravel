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

    <?php    $errors = session()->get('errors');  $messages = ''; ?>
    @foreach($errors->all("<p>:message</p>") as $message)
        <?php $messages .= $message ?>
    @endforeach
    <script type="text/javascript">
      $(function () {
        alert(" {!! $messages !!} ");
      })
    </script>

@endif
