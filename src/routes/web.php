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
    Route::resource('topics', 'TopicController');
    Route::resource('topics.comments', 'CommentController');
});
