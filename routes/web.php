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

//Basic routes
Route::get('/', function () { return view('welcome'); });
Route::get('/about', function() { return view('about'); });

//Task routes
Route::resource('/tasks', 'TasksController'); //Split out

// Blog routes
Route::get('/blog', 'PostsController@index');
Route::get('/blog/create', 'PostsController@create');
Route::get('/blog/{post}' , 'PostsController@show');
Route::get('/blog/tags/{tag}', 'TagsController@index');

Route::post('/blog', 'PostsController@store');
Route::post('/blog/{post}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
