<?php

//use Symfony\Component\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'stalingrad'], function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('account');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@Login');
});

//account
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');
    Route::get('/my/account', 'AccountController@index')->name('account');


    //admin
    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/', 'Admin\AccountController@index')->name('admin');

        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
            ->where('id','\d+')
            ->name('categories.edit');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')
            ->where('id','\d+')
            ->name('categories.edit');
        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
    });
});
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/my/account', 'AccountController@index')->name('account');
//});
