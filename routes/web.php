<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();//['verify'=>true]

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/memers','PagesController@memer');
Route::get('/notification','PagesController@notification');


Route::prefix('admin')->group(function(){
    Route::get('/login','Admin\AdminLoginController@showLoginForm');
    Route::post('/login','Admin\AdminLoginController@login')->name('admin.login');
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
});

Route::prefix('/admin/layout')->group(function(){
    Route::resource('/menu','Admin\AdminMenuController');
    Route::resource('/user','Admin\AdminUserController');

});

Route::resource('/posts','PostController');


