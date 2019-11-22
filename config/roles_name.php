<?php

function roles_name(int $int) {
    $roles_name = [
        0 => 'Пользователь',
        1 => 'Администратор'
    ];
    return $roles_name[$int];
}
