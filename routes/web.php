<?php

Route::get('/', 'MainController@index')->name('main'); // главная страница


Route::post('/search', 'MainController@search')->name('search');

//левая колонка меню

Route::get('/categories', 'Menu\CategoriesController@index')->name('categories');
Route::get('articles/linked/{id}', 'Menu\ArticlesController@linkedArticlesToTag')->where('id', '\d+')->name('linked.to.tag');

// Articles

Route::get('articles', 'Menu\ArticlesController@index')->name('articles');
Route::get('/articles/read/{id}', 'Menu\ArticlesController@readArticle')->where('id', '\d+')->name('articles.read');

// Tags

Route::get('tags', 'Menu\TagsController@index')->name('tags');


//Пользователи  пока  пустой

Route::group(['middleware' => 'auth'], function () {

});

// очистка кеша

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return redirect(route('main'));
})->name('clear');


// обработчик регистрации
Route::post('/register', 'Auth\RegisterController@register')->name('register');


// страница  восстановления пароля
//Route::get('recovery_password', 'Menu\ArticlesController@index')->name('articles');


Route::group(['middleware' => 'stalingrad'], function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('account');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/login', 'Auth\LoginController@login')->where('url', '[A-Za-z]+');
});

//account
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect(route('main'));
    })->name('logout');
    Route::get('/my/account', 'Account\AccountController@index')->name('account');
    Route::get('/my/account/change_password', 'Account\AccountController@form_change_password')->name('change_password');
    Route::post('/my/account/change_password', 'Account\AccountController@change_password');

});

Route::group(['middleware' => 'admin'], function () {

    Route::get('users', 'Admin\UsersController@index')->name('users');
    // категории
    Route::get('/categories/add', 'Menu\CategoriesController@addCategory')->name('categories.add');
    Route::post('/categories/add', 'Menu\CategoriesController@addRequestCategory');
    Route::get('/categories/edit/{id}', 'Menu\CategoriesController@editCategory')->where('id', '\d+')->name('categories.edit');
    Route::post('/categories/edit/{id}', 'Menu\CategoriesController@editRequestCategory')->where('id', '\d+')->name('categories.edit');
    Route::delete('/categories/delete', 'Menu\CategoriesController@deleteCategory')->name('categories.delete');

    // Articles

    Route::get('/articles/add', 'Menu\ArticlesController@addArticle')->name('articles.add');
    Route::post('articles/add', 'Menu\ArticlesController@addRequestArticle')->name('articles.add');
    Route::get('articles/edit/{id}', 'Menu\ArticlesController@editArticles')->where('id', '\d+')->name('articles.edit');
    Route::post('articles/edit/{id}', 'Menu\ArticlesController@editRequestArticle')->where('id', '\d+')->name('articles.edit');
    Route::delete('/articles/delete', 'Menu\ArticlesController@deleteArticle')->name('articles.delete');
    Route::post('/articles/addTags', 'Ajax\AjaxController@articlesAddTags');

    //tags
    Route::get('tags/add', 'Menu\TagsController@addTags')->name('tags.add');
    Route::post('tags/add', 'Menu\TagsController@addRequestTags')->name('tags.add');
    Route::get('tags/edit/{id}', 'Menu\TagsController@editTags')->where('id', '\d+')->name('tags.edit');
    Route::post('tags/edit/{id}', 'Menu\TagsController@editRequestTags')->where('id', '\d+')->name('tags.edit');
    Route::delete('tags/delete', 'Menu\TagsController@deleteTags')->name('tags.delete');

    //users

    Route::get('users/add', 'Admin\UsersController@addUsers')->name('users.add');
    Route::post('users/add', 'Admin\UsersController@requestAddUsers')->name('users.add');
    Route::get('users/edit/{id}', 'Admin\UsersController@editUsers')->where('id', '\d+')->name('users.edit');
    Route::post('users/edit/{id}', 'Admin\UsersController@editRequestUsers')->where('id', '\d+');

    Route::delete('users/delete', 'Admin\UsersController@deleteUsers')->name('users.delete');
});


//
//    //admin
//    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
//        Route::get('/', 'Admin\AccountController@index')->name('admin');
//
//        // Categories
//
//        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
//        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
//        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
//            ->where('id','\d+')
//            ->name('categories.edit');
//        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')
//            ->where('id','\d+')
//            ->name('categories.edit');
//        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
//
//        // Articles
//
//        Route::get('articles', 'Admin\ArticlesController@index')->name('articles');
//        Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('articles.add');
//        Route::get('articles/edit/{id}', 'Admin\ArticlesController@editArticles')->where('id', '\d')->name('articles.edit');
//        Route::post('articles/add', 'Admin\ArticlesController@addRequestArticle')->name('articles.add');
//
//        Route::delete('/articles/delete', 'Admin\ArticlesController@deleteArticle')->name('articles.delete');
//
//});
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/my/account', 'AccountController@index')->name('account');
//});

