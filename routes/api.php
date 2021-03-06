<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts/{id}', 'PostController@apiIndex')->name('api.posts.index');
Route::get('comments/{id}', 'CommentController@apiIndex')->name('api.comments.index');
Route::post('comments/{post_id}/{user_id}', 'CommentController@apiStore') -> name('api.comments.store');
