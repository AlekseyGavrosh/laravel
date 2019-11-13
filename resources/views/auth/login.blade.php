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
            <input type="email" id="myEmail" name="email" class="form-control" placeholder="Email">
            <label for="myPassword">Пароль</label>
            <input type="password" id="myPassword" name="password" class="form-control" placeholder="Пароль">
            <p><input type="checkbox" name="remember"> Запомнить пароль ?</p>
            <button type="submit" class="btn btn-primary">Авторизация</button>
        </div>
    </form>

</div>
</body>
</html>
