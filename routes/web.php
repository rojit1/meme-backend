<?php


Route::get('/', function () {
    return redirect('/login');
});

//Auth::routes();//['verify'=>true]
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/memers','PagesController@memer');
Route::get('/notification','PagesController@notification');
// 
Route::resource('/posts','PostController');
Route::resource('/comments','CommentController');
Route::post('/comments/{post}','CommentController@addComment')->name('comments.add');

// search 

Route::get('/search','SearchController@search')->name('search');

// Likes

Route::post('/like/{post}','LikesController@addLike')->name('like.add');
Route::get('/like/{post}','LikesController@removeLike')->name('like.remove');


Route::get('/profile/view/{user}','UserProfileController@showProfile')->name('user.profile');
Route::get('/profile/{user}','UserProfileController@editProfile')->name('user.editprofile');
Route::put('/profile/{user}','UserProfileController@updateProfile')->name('user.updateProfile');




Route::prefix('admin')->group(function(){
    Route::get('/login','Admin\AdminLoginController@showLoginForm');
    Route::post('/login','Admin\AdminLoginController@login')->name('admin.login');
    Route::resource('/profile','Admin\AdminProfileController');
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');

});

Route::prefix('/admin/layout')->group(function(){
    Route::resource('/menu','Admin\AdminMenuController');
    Route::resource('/user','Admin\AdminUserController');
    Route::resource('/root','Admin\AdminRootController');
});



