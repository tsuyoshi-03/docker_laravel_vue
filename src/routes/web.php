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


// ['verify' => true] を追記
Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');


// 'verified' を追記
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/','TopicController@index');

    //自ユーザーのみアクセス可能
    Route::get('user/mypage', 'UserController@mypage')->name('user.mypage');
    //各ユーザーの投稿ページ
    Route::get('user/{user}', 'UserController@show')->name('user.show');


    Route::get('name/{user}/edit', 'UserController@name_edit')->name('name.edit');
    Route::put('name/{user}', 'UserController@name_update')->name('name.update');

    //Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
    //Route::put('user/{user}', 'UserController@update')->name('user.update');

    Route::resource('topics', 'TopicController');
    Route::resource('topics.comments', 'CommentController');
});
