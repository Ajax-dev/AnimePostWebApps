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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/string1', function() {
    return('Welcome to the test of a string return');
});

Route::get('animeposts', 'AnimePostController@index')->name('animeposts.index');
Route::get('animeposts/create', 'AnimePostController@create')->name('animeposts.create');
Route::post('animeposts', 'AnimePostController@store')->name('animeposts.store');
Route::get('animeposts/{id}', 'AnimePostController@show')->name('animeposts.show');

Auth::routes();

Route::get('/home', 'AnimePostController@index')->name('home');
