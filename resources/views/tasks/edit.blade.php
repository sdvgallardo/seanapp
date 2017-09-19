<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta name="_token" content="{{ csrf_token() }}">
    <title>Tasks!</title>

    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>


@include('layouts.nav')

  <div class="col-sm-8 blog-main">
    <h1>Add New Task</h1>

    <hr>

    <form method="POST" action="/tasks/edit/{{ $task->id }}" >
      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Task</label>
        <input type="text" class="form-control" id="body" name="body" value="{{ $task->body }}">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update task</button>
      </div>

      @include('layouts.errors')

    </form>

  </div>
