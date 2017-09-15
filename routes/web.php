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
Route::get('/test', 'TestController@index');

//Task routes
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::get('/tasks/delete/{task}', 'TasksController@destroy');
Route::get('/tasks/complete/{task}', 'TasksController@complete');
Route::get('/tasks/{task}', 'TasksController@show');
Route::post('/tasks', 'TasksController@store');

// Blog routes
  // Get routes
  Route::get('/blog', 'PostsController@index');                           // Base blog page
  Route::get('/blog/archive/{month}/{year}', 'PostsController@archives'); // Page for a specified month
  Route::get('/blog/tag/{tag}', 'TagsController@index');                  // Page for a specified tag
  Route::get('/blog/edit/post/{post}', 'PostsController@edit');
  Route::get('/blog/user/{userID}', 'UsersController@index');             // Page for a specified user
  Route::get('/blog/create', 'PostsController@create');                   // Create page
  Route::get('/blog/post/{post}' , 'PostsController@show');               // Page for a specified post
  //Post routes
  Route::post('/blog/edit/post/{post}', 'PostsController@update');
  Route::post('/blog', 'PostsController@store');                          // Stores a new post on the database
  Route::post('/blog/{post}/comments', 'CommentsController@store');       // Stores a new comment

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
