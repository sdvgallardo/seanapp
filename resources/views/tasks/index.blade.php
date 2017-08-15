<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks!</title>
</head>
<body>
    <ul>
      @foreach ($tasks as $task)
        <li>
          <a href="/tasks/{{ $task->id }}">
              {{ $task->body }}
          </a>
        </li>
      @endforeach
    </ul>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta name="_token" content="{{ csrf_token() }}">
    <title>Tasks!</title>

    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
    @include('layouts.nav')
    <div class="container-narrow">
        <h2>Task List</h2>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Task</button>
        <div>
          <!-- Table-to-load-the-data Part -->
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Date Added</th>
                <th>Completed?</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="tasks-list" name="tasks-list">
              @foreach ($tasks as $task)
                <tr id="task{{$task->id}}">
                  <td> {{$task->id}} </td>
                  <td> <a href="/tasks/{{ $task->id }}"> {{$task->body}} </a> </td>
                  <td>{{$task->created_at}}</td>
                  <td> {{ $task->completed === 1 ? 'yes' : 'no' }}</td>
                  <td>
                    <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$task->id}}">Edit</button>
                    <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$task->id}}">Delete</button>
                  </td>
                    </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="{{asset('js/ajax-crud.js')}}"></script>
</body>
</html>
