<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/my/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public  function  login(Request $request) {

        try {
            $this->validate($request,[
                'email' => 'required|min:3|max:255',
                'password' => 'required|min:6'
            ]);

            $remember = $request->has('remember') ? true : false;
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {

                return redirect(route('main'))->with('success', trans('Вы успешно залогинены')); // это  должна быть ссылка на файл с сообщениями messages.auth.successLogin
            }
            return back()->with('errors', trans('messages.auth.errorLogin'));
        }
        catch (ValidationException $e) {

            \Log::error($e->getMessage());
            return back()->with('errors', trans('messages.auth.errorLogin'));
            }

    }
}
