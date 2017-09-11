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
use App\Task;
use Controllers\TasksController;
use Illuminate\Http\Request;

//Basic routes
Route::get('/', function () { return view('welcome'); });
Route::get('/about', function() { return view('about'); });
Route::get('/test', function() { return view('test'); });

//Task routes
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::get('/tasks/delete/{task}', 'TasksController@destroy');
Route::get('/tasks/complete/{task}', 'TasksController@complete');
Route::get('/tasks/{task}', 'TasksController@show');
Route::post('/tasks', 'TasksController@store');

// Blog routes
Route::get('/blog', 'PostsController@index');
Route::get('/blog/create', 'PostsController@create');
Route::get('/blog/{post}' , 'PostsController@show');
Route::get('/blog/tags/{tag}', 'TagsController@index');
Route::post('/blog', 'PostsController@store');
Route::post('/blog/{post}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
