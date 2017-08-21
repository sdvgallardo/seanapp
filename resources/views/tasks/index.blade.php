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
        @if (Auth::check())
        <div class="sidebar-module">
          <a href = '/tasks/create'><button type="create" class="btn btn-primary">Add New Task</button></a>
        </div>
        @endif
        <div>
            <!-- Table-to-load-the-data Part -->
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
                    <tr id="task{{$task->id}}">
                      <td> {{$task->id}} </td>
                      <td> <a href="/tasks/{{ $task->id }}"> {{$task->body}} </a> </td>
                      <td>{{$task->created_at}}</td>
                      <td>{{$task->user->name }} </td>
                      <td> {{ $task->completed === 1 ? 'yes' : 'no' }}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{ $task->id }}">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{ $task->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Task Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Task</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="task" name="task" placeholder="Task" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="task_id" name="task_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/tasks.js')}}"></script>
</body>
</html>
