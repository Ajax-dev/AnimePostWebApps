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

Route::get('/string1', function() {
    return('Welcome to the test of a string return');
});

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('posts/{id}', 'PostController@show')->name('posts.show');

Auth::routes();

Route::get('/', 'PostController@index')->name('home');
