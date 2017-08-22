<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Tasks!</title>

      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

      <!-- Custom styles for this template -->
      <link href="/css/blog.css" rel="stylesheet">
  </head>

  <body>
  @include('layouts.nav')
    <div class="container-narrow">
      <h2>Task List</h2>
      @if (Auth::check())
        <div class="sidebar-module">
          <a href = '/tasks/create'><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Task</button></a>
        </div>
      @endif

      <div>
        <table class="table">

          <thead>
            <tr>
              <th>ID</th>
              <th>Task</th>
              <th>Date Created</th>
              <th>Added by</th>
              <th>Completed?</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody id="tasks-list" name="tasks-list">
            @foreach ($tasks as $task)
              @if ( $task->user->id == auth()->id() )
                <tr id="task{{$task->id}}">
                  <td> {{ $task->id }} </td>
                  <td> <a href="/tasks/{{ $task->id }}"> {{$task->body}} </a> </td>
                  <td>{{$task->created_at}}</td>
                  <td>{{$task->user->name }} </td>
                  <td> {{ $task->completed === 1 ? 'yes' : 'no' }}</td>
                  <td>
                    <!-- <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$task->id}}">Edit</button> -->
                    @if ( $task->completed ) <a href="/tasks/complete/{{ $task->id }}"><button class="btn btn-warning btn-xs btn-detail" value="{{ $task->id }}">Incomplete</button></a>
                    @else                    <a href="/tasks/complete/{{ $task->id }}"><button class="btn btn-success btn-xs btn-detail" value="{{ $task->id }}">Complete</button></a>
                    @endif

                    <a href="/tasks/delete/{{ $task->id }}"><button class="btn btn-danger btn-xs btn-delete" value="{{ $task->id }}">Delete</button></a>
                  </td>
                </tr>

              @endif
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </body>
</html>
