<?php

namespace App\Http\Controllers\Account;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function index()
    {


        return view('account.index');
    }

    public function form_change_password()
    {

        return view('account.change_password');
    }

    public function change_password(Request $request)
    {

        try {
            $this->validate($request, [
                'password' => 'required|min:6',
                'pass_new' => 'required|min:6',
                'pass_new_sec' => 'required|min:6'
            ]);

            $user = Auth::user();

            if (Hash::check($request->input('password'), $user->getAuthPassword())) {

                if ($request->input('pass_new') === $request->input('pass_new_sec')) {

                    $obj_user = User::find($user->id);
                    $password = $request->input('pass_new');
                    $obj_user->password = Hash::make($password);
//
                    if ($obj_user->save()) {

                        return redirect(route('change_password'))->with('success', trans('Вы успешно поменяли пароль')); // тут надо подключить файл месседжес
                    }
                    return redirect(route('change_password'))->with('success', trans('Пароль не  изменен'));
                }
                return redirect(route('change_password'))->with('success', trans('Введите одинаковые новые пароли'));
            }
            return redirect(route('change_password'))->with('success', trans('Пароль  не успешно изменен'));

        } catch (ValidationException $e) {

            \Log::error($e->getMessage());
            return back()->with('errors', trans('messages.change.errorPassword'));
        }
    }








}
