jQuery(document).ready(function ($) {
    var $form_modal = $('.cd-user-modal'),
        $form_login = $form_modal.find('#cd-login'),
        $form_signup = $form_modal.find('#cd-signup'),
        $form_forgot_password = $form_modal.find('#cd-reset-password'),
        $form_modal_tab = $('.cd-switcher'),
        $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
        $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
        $forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
        $back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
        $main_nav = $('.main-nav')

    //открыть модальное окно
    $main_nav.on('click', function (event) {

        if ($(event.target).is($main_nav)) {
            // открыть на мобильных подменю
            $(this).children('ul').toggleClass('is-visible')
        } else {
            // закрыть подменю на мобильных
            $main_nav.children('ul').removeClass('is-visible')
            //показать модальный слой
            $form_modal.addClass('is-visible');
            //показать выбранную форму
            ($(event.target).is('.cd-signup')) ? signup_selected() : login_selected()
        }

    })

    //закрыть модальное окно
    $('.cd-user-modal').on('click', function (event) {
        if ($(event.target).is($form_modal) || $(event.target).is('.cd-close-form')) {
            $form_modal.removeClass('is-visible')
        }
    })
    //закрыть модальное окно нажатье клавиши Esc
    $(document).keyup(function (event) {
        if (event.which == '27') {
            $form_modal.removeClass('is-visible')
        }
    })

    //переключения  вкладки от одной к другой
    $form_modal_tab.on('click', function (event) {
        event.preventDefault();
        ($(event.target).is($tab_login)) ? login_selected() : signup_selected()
    })

    //скрыть или показать пароль
    $('.hide-password').on('click', function () {
        var $this = $(this),
            $password_field = $this.prev('input');

        ('password' == $password_field.attr('type')) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
        ('Скрыть' == $this.text()) ? $this.text('Показать') : $this.text('Скрыть')
        //фокус и перемещение курсора в конец поля ввода
        $password_field.putCursorAtEnd()
    })

    //показать форму востановления пароля
    $forgot_password_link.on('click', function (event) {
        event.preventDefault()
        forgot_password_selected()
    })

    //Вернуться на страницу входа с формы востановления пароля
    $back_to_login_link.on('click', function (event) {
        event.preventDefault()
        login_selected()
    })

    function login_selected () {
        $form_login.addClass('is-selected')
        $form_signup.removeClass('is-selected')
        $form_forgot_password.removeClass('is-selected')
        $tab_login.addClass('selected')
        $tab_signup.removeClass('selected')
    }

    function signup_selected () {
        $form_login.removeClass('is-selected')
        $form_signup.addClass('is-selected')
        $form_forgot_password.removeClass('is-selected')
        $tab_login.removeClass('selected')
        $tab_signup.addClass('selected')
    }

    function forgot_password_selected () {
        $form_login.removeClass('is-selected')
        $form_signup.removeClass('is-selected')
        $form_forgot_password.addClass('is-selected')
    }

    // //при желании можно отключить - это просто, сообщения об ошибках при заполнении
    // $form_login.find('input[type="submit"]').on('click', function(event){
    // 	event.preventDefault();
    // 	$form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
    // });
    // $form_signup.find('input[type="submit"]').on('click', function(event){
    // 	event.preventDefault();
    // 	$form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
    // });

    //запасной placeholder для IE9
    //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
    if (!Modernizr.input.placeholder) {
        $('[placeholder]').focus(function () {
            var input = $(this)
            if (input.val() == input.attr('placeholder')) {
                input.val('')
            }
        }).blur(function () {
            var input = $(this)
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'))
            }
        }).blur()
        $('[placeholder]').parents('form').submit(function () {
            $(this).find('[placeholder]').each(function () {
                var input = $(this)
                if (input.val() == input.attr('placeholder')) {
                    input.val('')
                }
            })
        })
    }

    if (document.getElementById('editor1') != null) {
        var ckeditor1 = CKEDITOR.replace('editor1')
        AjexFileManager.init({
            returnTo: 'ckeditor',
            editor: ckeditor1
        })
    }

    // $('.tags_input').change(function(){
    //     alert('Что-то изменилось...');
    // });

    // $(".tags_input").keyup(function(e) {
    //
    //     event.preventDefault()
    //     e
    //     let word = $(this).val()
    //     let url = $(this).attr('res')
    //
    //     $.ajax({
    //         method:'POST',
    //         url: '/articles/addTags',
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: {word: word},
    //
    //         success: function(data) {
    //             console.dir(data)
    //           //  alert('Успешно');
    //         },
    //         error: function() {
    //         //    alert('Провал');
    //         }
    //     })
    //
    //
    //     if (e.which == 13) {
    //         return false;
    //     }
    // });

    // var datalist = $(".data_option");
    //
    // datalist.click(function(){
    //     alert(4);
    //     var $this = $(this);
    //
    //     if ($this.hasClass('open')) {
    //         alert($this.val());
    //         $this.removeClass('open');
    //     }else {
    //         $this.addClass('open');
    //         alert(554)
    //     }
    // });
    //

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.tags_input').on('keyup change', function (e) {

        if ($(this).val().length > 1) {
            let text = this.value.split(' ').join('')
            let data_option = $('.data_option')
            let pass = false
            for (let i = 0; i < data_option.length; ++i) {
                if ($(data_option[i]).val() === this.value) {
                    if (confirm('Вы  хотите добавить  ' + $(data_option[i]).val() + ' ? ')) {
                        pass = true
                    }
                }
            }
            if (e.keyCode === 13 || pass === true) {
                let tags_div = $('.tags_div')
                let add = true
                for (let i = 0; i <= tags_div.length; i++) {
                    if ($(tags_div[i]).attr('title') === text) {
                        alert('Данный Тег уже добавлен')
                        add = false
                        break
                    }
                }

                if (add) {
                    let div_tag = document.createElement('div')
                    let name_tags = document.createElement('div')
                    let img = document.createElement('img')
                    let a = document.createElement('a')
                    let option = document.createElement('option')

                    name_tags.setAttribute('class', 'name_tags')
                    name_tags.innerHTML = this.value

                    img.setAttribute('src', '/public/img/iconk_del_tags.ico')
                    img.setAttribute('class', 'tags_del_icon')

                    a.setAttribute('class', 'tags_del_a')
                    a.setAttribute('href', '#')
                    a.setAttribute('res', text)
                    a.appendChild(img)

                    option.setAttribute('value', this.value)
                    option.setAttribute('title', text)
                    option.setAttribute('selected', true)

                    div_tag.setAttribute('class', 'tags_div')
                    div_tag.setAttribute('title', text)
                    div_tag.appendChild(name_tags)
                    div_tag.appendChild(a)
                    let block_add_Tags = document.getElementById('block_add_Tags')
                    let tags_select = document.getElementById('tags_select')
                    block_add_Tags.appendChild(div_tag)
                    tags_select.appendChild(option)

                }
                $(this).val('')
                return false
            }
        }

    })

    $('body').on('click', '.tags_del_a', function (event) {
        let data = $(this).attr('res')
        let text = data.split(' ').join('')
        console.log(text)
        $('[title=' + text + ']').remove()

    })

    $('form').keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault()
            return false
        }
    })

})

jQuery.fn.putCursorAtEnd = function () {
    return this.each(function () {
        // If this function exists...
        if (this.setSelectionRange) {
            var len = $(this).val().length * 2
            this.setSelectionRange(len, len)
        } else {
            // ... otherwise replace the contents with itself
            // (Doesn't work in Google Chrome)
            $(this).val($(this).val())
        }
    })
}
