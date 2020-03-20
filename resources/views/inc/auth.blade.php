<div class="cd-user-modal">
    <div class="cd-user-modal-container">
        <ul class="cd-switcher">
            <li><a href="#0">Вход</a></li>
            <li><a href="#0">Регистрация</a></li>
        </ul>
        <div id="cd-login">
            <form class="form-horizontal cd-form" action="{!! route('login') !!}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="myEmail">Email</label>
                    <input type="email" id="myEmail" name="email" class="form-control" placeholder="Email">
                    <label for="myPassword">Пароль</label>
                    <input type="password" id="myPassword" name="password" class="form-control" placeholder="Пароль">
                    <p class="block_remember_me"><input type="checkbox" name="remember"> Запомнить пароль ?</p>
                    <button type="submit" class="btn btn-primary">Авторизация</button>
                </div>
            </form>
            <p class="terms_of_use"><a href="#0">Правила пользования</a></p>
            <p class="cd-form-bottom-message"><a href="#0">Забыли свой пароль?</a></p>
            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-login -->
        <div id="cd-signup"> <!-- форма регистрации -->
            <form class="cd-form" method="post" action="{!! route('register') !!}">
                {{ csrf_field() }}
                <div class="fieldset">
                    <label class="image-replace cd-username" for="signup-username">Имя пользователя</label>
                    <input class="full-width has-padding has-border" name="name" id="signup-username" type="text"
                           placeholder="Имя пользователя">
                </div>
                <div class="fieldset">
                    <label class="image-replace cd-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email"
                           name="email" placeholder="E-mail">
                </div>
                <div class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Пароль</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="password"
                           name="password" placeholder="Пароль">
                    <a href="#0" class="hide-password">Скрыть</a>
                </div>
                <div class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Введите пароль еще раз</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="password"
                           name="password_second" placeholder="Повторите пароль">
                    <a href="#0" class="hide-password">Скрыть</a>
                </div>
                <div class="block_remember_me"><input type="checkbox" name="remember"> Запомнить пароль ?</div>
                <div class="fieldset">
                    <input type="checkbox" id="accept-terms">
                    <label for="accept-terms">Я согласен с <a class="terms_of_use_for_register terms_of_use" href="#0">Условиями</a></label>
                </div>
                <div class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Создать аккаунт">
                </div>
            </form>
            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-signup -->

        <div id="cd-reset-password"> <!-- форма восстановления пароля -->
            <p class="cd-form-message">Забыли пароль? Пожалуйста, введите адрес своей электронной почты. Вы получите
                ссылку, чтобы создать новый пароль.</p>
            <form class="cd-form">
                <div class="fieldset">
                    <label class="image-replace cd-email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                    <span class="cd-error-message">Здесь сообщение об ошибке!</span>
                </div>
                <div class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Восстановить пароль">
                </div>
            </form>
            <p class="cd-form-bottom-message"><a href="#0">Вернуться к входу</a></p>
        </div> <!-- cd-reset-password -->
        <a href="#0" class="cd-close-form">Закрыть</a>
    </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
<div class="overlay_popup"></div>
<div class="block_terms_of_use">
    <a href="#" class="close"></a>
    <p>loren*100Не следует, однако, забывать, что укрепление и развитие внутренней структуры говорит о возможностях
        экспериментов, поражающих по своей масштабности и грандиозности. Разнообразный и богатый опыт говорит нам,
        что высококачественный прототип будущего проекта выявляет срочную потребность приоритизации разума над
        эмоциями. Кстати, базовые сценарии поведения пользователей освещают чрезвычайно интересные особенности
        картины в целом, однако конкретные выводы, разумеется, смешаны с не уникальными данными до степени
        совершенной неузнаваемости, из-за чего возрастает их статус бесполезности. Сложно сказать, почему
        реплицированные с зарубежных источников, современные исследования лишь добавляют фракционных разногласий и
        ассоциативно распределены по отраслям. Безусловно, перспективное планирование играет важную роль в
        формировании прогресса профессионального сообщества.</p>


</div>
