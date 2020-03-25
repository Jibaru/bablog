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

Auth::routes();

Route::get('/administrador', 'HomeController@index')->name('home');

Route::post('/login-user', 'AuthenticationController@login');
Route::get('/auth', 'AuthenticationController@auth');
Route::get('/logout', 'AuthenticationController@logout');
Route::resource('/roles', 'RoleController');
Route::resource('/users', 'UserController');
Route::resource('/categories', 'CategoryController');
Route::resource('/posts', 'PostController');
Route::get('/front-posts', 'PostController@front');
Route::resource('/comments', 'CommentController');
Route::resource('/posts-views', 'PostViewController');
Route::resource('/files', 'FileController');
Route::get('/comments-by-post-id/{id}', 'CommentController@getByPostId');

Route::get('/insert-all', 'DBImportController@insertAll');
