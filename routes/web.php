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
use Illuminate\Http\Request;

//Basic routes
Route::get('/', function () { return view('welcome'); });
Route::get('/about', function() { return view('about'); });

//Task routes
// Route::resource('/tasks', 'TasksController'); //Split out

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::get('/tasks/{task}', 'TasksController@show');
Route::post('/tasks', 'TasksController@store');

// Route::put('/tasks/{task}',function(Request $request,$task_id){
//     $task = Task::find($task_id);
//
//     $task->task = $request->task;
//     $task->description = $request->description;
//
//     $task->save();
//
//     return Response::json($task);
// });
//
// Route::delete('/tasks/{task_id?}', 'TasksController@destroy');


// Blog routes
Route::get('/blog', 'PostsController@index');
Route::get('/blog/create', 'PostsController@create');
Route::get('/blog/{post}' , 'PostsController@show');
Route::get('/blog/tags/{tag}', 'TagsController@index');

Route::post('/blog', 'PostsController@store');
Route::post('/blog/{post}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
