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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/about', function() {
    return view('about');
  });

Route::get('/blog', 'PostsController@index');
Route::get('/blog/create', 'PostsController@create');
Route::post('/blog', 'PostsController@store');
Route::get('/blog/{post}' , 'PostsController@show');

Route::post('/blog/{post}/comments', 'CommentsController@store');
