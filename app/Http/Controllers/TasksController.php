<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
      $tasks = Task::all();
      return view('tasks.index', compact('tasks'));
    }

    public function create(){
      return view('tasks.create');
    }

    public function store(){
      $this->validate(request(), [
        'body' => 'required',
      ]);

      if(request('completed')){
        $this->completed = '1';
      } else $this->completed = '0';

      Task::create([
        'body' => request('body'),
        'user_id' => auth()->id(),
        'completed' => $this->completed
      ]);
      //Redirect to homepage
      return redirect ('/tasks');
    }

    public function show(Task $task){
      return view('tasks.show', compact('task'));
    }

    public function edit($id){
    //
    }

    public function update(Request $request, $id){
    //
    }

    public function destroy($id){
      $task = Task::find($id);
      $task->delete();

      return Redirect::to('tasks');
    }
}
