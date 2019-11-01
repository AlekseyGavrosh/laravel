
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/public/css/main.css">

<div style="display: flex; align-items: center; height: 100%;">
    <div class="container container-fluid align-items-center">
        <div class="row align-items-center">
            <div class="col-md-offset-3 col-md-6">

                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Войти</a></li>
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Зарегистрироваться</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <form class="form-horizontal" action="{!! route('login') !!}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email пользователя</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <div class="main-checkbox">
                                        <input value="None" id="checkbox1" name="check" type="checkbox">
                                        <label for="checkbox1"></label>
                                    </div>
                                    <span class="text">Keep me Signed in</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Войти</button>
                                </div>
                                <div class="form-group forgot-pass">
                                    <button type="submit" class="btn btn-default">forgot password</button>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- /.col-md-offset-3 col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
