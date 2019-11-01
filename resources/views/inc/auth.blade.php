<div class="cd-user-modal"> <!-- все формы на фоне затемнения-->
    <div class="cd-user-modal-container"> <!-- основной контейнер -->
        <ul class="cd-switcher">
            <li><a href="#0">Вход</a></li>
            <li><a href="#0">Регистрация</a></li>
        </ul>

        <div id="cd-login"> <!-- форма входа -->
            <form class="form-horizontal cd-form" action="{!! route('login') !!}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="myEmail">Email</label>
                    <input type="email" id="myEmail" name="email" class="form-control" placeholder="Email">
                    <label for="myPassword">Пароль</label>
                    <input type="password" id="myPassword" name="password" class="form-control" placeholder="Пароль">
                    <p><input type="checkbox" name="remember"> Запомнить пароль ?</p>
                    <button type="submit" class="btn btn-primary">Авторизация</button>
                </div>
            </form>

            <p class="cd-form-bottom-message"><a href="#0">Забыли свой пароль?</a></p>
            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-login -->

        <div id="cd-signup"> <!-- форма регистрации -->
            <form class="cd-form" method="post" action="{!! route('register') !!}">

                {{ csrf_field() }}

                <p class="fieldset">
                    <label class="image-replace cd-username" for="signup-username">Имя пользователя</label>
                    <input class="full-width has-padding has-border" name="name" id="signup-username" type="text"
                           placeholder="Имя пользователя">
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email"
                           name="email" placeholder="E-mail">
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Пароль</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="text"
                           name="password" placeholder="Пароль">
                    <a href="#0" class="hide-password">Скрыть</a>
                </p>

                <p><input type="checkbox" name="remember"> Запомнить пароль ?</p>

                <p class="fieldset">
                    <input type="checkbox" id="accept-terms">
                    <label for="accept-terms">Я согласен с <a href="#0">Условиями</a></label>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Создать аккаунт">
                </p>


            </form>

            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-signup -->

        <div id="cd-reset-password"> <!-- форма восстановления пароля -->
            <p class="cd-form-message">Забыли пароль? Пожалуйста, введите адрес своей электронной почты. Вы получите
                ссылку, чтобы создать новый пароль.</p>

            <form class="cd-form">
                <p class="fieldset">
                    <label class="image-replace cd-email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                    <span class="cd-error-message">Здесь сообщение об ошибке!</span>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Восстановить пароль">
                </p>
            </form>

            <p class="cd-form-bottom-message"><a href="#0">Вернуться к входу</a></p>
        </div> <!-- cd-reset-password -->
        <a href="#0" class="cd-close-form">Закрыть</a>
    </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
