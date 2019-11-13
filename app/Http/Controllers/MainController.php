<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function  index() {

        $main = ' Это главная страница';

        return view('menu.index', ['main' => $main]);
    }
}
