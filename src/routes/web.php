<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/','TopicController@index');

    //マイページ
    Route::get('user/mypage', 'UserController@mypage')->name('user.mypage');
    //各ユーザーページ
    Route::get('user/{user}', 'UserController@show')->name('user.show');
    //ユーザーネーム編集
    Route::get('name/{user}/edit', 'UserController@name_edit')->name('name.edit');
    Route::put('name/{user}', 'UserController@name_update')->name('name.update');

    Route::resource('topics', 'TopicController');
    Route::resource('topics.comments', 'CommentController');
});


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    Route::middleware('auth:admin')->group(function () {
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });

});
