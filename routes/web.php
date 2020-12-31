<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PostController@index');

Route::get('/string1', function() {
    return('Welcome to the test of a string return');
});

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
Route::post('posts', 'PostController@store')->name('posts.store')->middleware('auth');
Route::get('posts/{id}', 'PostController@show')->name('posts.show');
Route::get('posts/edit/{id}', 'PostController@edit') -> name('posts.edit') -> middleware('auth');
Route::put('posts/{id}/update', 'PostController@update') -> name('posts.update') -> middleware('auth');



Route::post('posts/comment', 'CommentController@store') -> name('comments.store') -> middleware('auth');

Route::get('posts/comment/{id}', 'CommentController@edit') -> name('comments.edit') -> middleware('auth');

Route::put('posts/comment/{id}/update', 'CommentController@update') -> name('comments.update') -> middleware('auth');


Auth::routes();

Route::get('/home', 'PostController@index')->name('home');
