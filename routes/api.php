<?php

use Illuminate\Http\Request;

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

// list of Posts
Route::get('posts', 'PostController@index');

// Single Post
Route::get('post/{id}', 'PostController@show');

// Add Post
Route::post('post', 'PostController@store');

// Edit Post
Route::put('post/{id}', 'PostController@update');

// Delete Post
Route::delete('post/{id}', 'PostController@destroy');


// Route groups by prefix
Route::prefix('comments')->group(function () {
    Route::get('/', 'CommentController@index');
    Route::get('/{id}','CommentController@show');
    Route::post('/','CommentController@store');
    Route::put('/{id}','CommentController@update');
    Route::delete('/{id}','CommentController@destroy');
});
