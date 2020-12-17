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

Route::get('/string3', function() {
    return('This is a test to return string 2');
});

Route::get('/home', function() {
    return('What are you doing here?');
});
