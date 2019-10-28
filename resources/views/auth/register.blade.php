<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap-grid.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid mt-3">

    <form method="post" style="width: 300px">
        {{ csrf_field() }}
        <div class="form-group" method="post">
            <label for="myEmail">Email</label>
            <input type="email" id="myEmail"  name="email" class="form-control" placeholder="Email">
            <label for="myPassword">Пароль</label>
            <input type="password" id="myPassword" name="password" class="form-control" placeholder="Пароль">
            <label for="myPassword">Повторите Пароль</label>
            <input type="password" id="myPassword" name="password_second" class="form-control" placeholder="Повторите пароль">
            <p><input type="checkbox" name="remember"> Запомнить пароль ?</p>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </div>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
