<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {


        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $isAuth = $remember = $request->has('remember') ? true : false;


        $objUser = $this->create(['email' => $email, 'password' => $password, 'name' => $name,]);
     //   $this->guard()->login($user);

        if(!($objUser instanceof User)) {
            return back()->with('errors', 'Can"t create object');
        }

        if ($isAuth) {
            $this->guard()->login($objUser);
        }

        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember);

            return redirect(route('main'))->with('success', ' Вы успешно зарегины');

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       // dd($data);
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
