<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tasks!</title>

    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>


<body>
    @include('layouts.nav')
    <div class="container-narrow">
        <h2>Task List</h2>
        <a href = '/tasks/create'><button type="create" class="btn btn-primary">Add New Task</button></a>
        <div>
          <!-- Table-to-load-the-data Part -->
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Date Added</th>
                <th>Added By</th>
                <th>Completed?</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="tasks-list" name="tasks-list">
              @foreach ($tasks as $task)
              @if ( $task->user->id == auth()->id() )
                <tr id="task{{$task->id}}">
                  <td> {{$task->id}} </td>
                  <td> <a href="/tasks/{{ $task->id }}"> {{$task->body}} </a> </td>
                  <td>{{$task->created_at}}</td>
                  <td>{{$task->user->name }} </td>
                  <td> {{ $task->completed === 1 ? 'yes' : 'no' }}</td>
                  <td>
                    <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$task->id}}">Edit</button>
                    <form method="POST" action="/tasks/{{$task->id}}">
                      <input type="hidden" name="_method" value="DELETE">
                      <button onclick="this.form.submit"  class="btn btn-danger btn-xs btn-delete delete-task" value="{{$task->id}}">Delete</button>
                    </form>
                  </td>
                    </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="{{asset('js/tasks.js')}}"></script>
</body>
</html>
