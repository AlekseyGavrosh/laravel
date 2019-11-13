<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Roles;
use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersController extends Controller
{


    public function index()
    {


        $users = DB::table('users')
            ->select('users.*')
            ->paginate(10);


        return view('menu.users.index', ['users' => $users]);

    }

    public function addUsers()
    {
        $objRoles = new Roles();
        $roles = $objRoles->get();

        return view('menu.users.add', ['roles' => $roles]);
    }

    public function requestAddUsers(UsersRequest $request) {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $isAdmin = $request->input('roles') == 2 ? 1 : 0;   //  потом  будет больше ролей и надо будет переписать

        $objUser = $this->create(['email' => $email, 'password' => $password, 'name' => $name, 'isAdmin' => $isAdmin]);
        //   $this->guard()->login($user);

        if(!($objUser instanceof User)) {
            return redirect(route('users'))->with('success', 'Пользователь не создан');
        }

        return redirect(route('users'))->with('success', 'Пользователь создан');
    }

    public function editUsers(int $id) {

        $objUser = User::find($id);
        if (!$objUser) {
            return abort(404);
        }

        $objRoles = new Roles();
        $roles = $objRoles->get();


        return view('menu.users.edit', ['user' => $objUser, 'roles' => $roles]);

    }

    public function editRequestUsers(UsersRequest $request, int $id) {

        try {

            $objUser = User::find($id);

            if (empty($objUser)) {
                return abort(403);
            }


            $objUser->isAdmin = $request->input('roles');
            $objUser->name = $request->input('name') ?? '';
            $objUser->email = $request->input('email');
            if (strlen($request->input('password')) > 6 && strlen($request->input('password')) < 20) {
                $objUser->password = Hash::make($request->input('password'));
            }

            if ($objUser->save()) {

                return redirect()->route('users')->with('success', 'Пользователь изменен');
            }

            return back()->with('success', 'Не удалось изменить пользователя');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('errors', $e->getMessage());
        }


    }

    public function deleteUsers(Request $request)
    {

        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objUser = new User();
            $objUser->where('id', $id)->delete();
            echo 'success';
        }
    }


    /**
     * Создание нового пользователя через админку
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
            'isAdmin' => $data['isAdmin'],
        ]);
    }
    //
}
