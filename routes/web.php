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

Route::get('/','WelcomeController@index');

Route::get('/show/{id}','WelcomeController@show');

Route::prefix('users')->group(function(){
Route::resource('posts','PostController')->middleware('auth');});

Auth::routes();



Route::get('/home', 'WelcomeController@index')->name('home');

Route::post('/posts/{post_id}/create_comment','PostController@create_comment')->middleware('auth');

Route::get('/about', function () {
    return view('about');
});
