<?php
/**
 * Created by PhpStorm.
 * User: a.gavrosh
 * Date: 25.10.2019
 * Time: 13:16
 */

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;


class AccountController extends Controller
{

    public function  index() {


        return view('account.index');
    }
}
