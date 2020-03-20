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

    public function login(Request $request, $url = '')
    {

        $url = !empty($url) ? $url : 'main';

        try {
            $this->validate($request, [
                'email' => 'required|min:3|max:255',
                'password' => 'required|min:6'
            ]);

            $remember = $request->has('remember') ? true : false;
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {

          //      dd($request->user()->name);

//                @lang('messages.Hello', ['name' => 'John'])
//
                return redirect(route($url))->with('success', trans('messages.auth.successLogin', ['name' => $request->user()->name]));
//                return redirect()->intended('dashboard'); это переброска на страницу куда требуется права
            }
            return back()->with('errors', trans('messages.auth.errorLogin', ['name' => $request->input('email')]));
        } catch (ValidationException $e) {

            \Log::error($e->getMessage());
            return back()->with('errors', trans('messages.auth.errorLogin'));
        }

    }
}
