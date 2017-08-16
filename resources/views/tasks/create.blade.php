@include('layouts.nav')

  <div class="col-sm-8 blog-main">
    <h1>Add New Task</h1>

    <hr>

    <form method="POST" action="/tasks" >
      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Task</label>
        <input type="text" class="form-control" id="body" name="body">
      </div>

<!--
      <div class="form-group">
        <label for="body">Mark as Done?</label>
        <input type="tinyint" class="form-control" id="completed" name="completed">
      </div>
-->

      <div class="checkbox">
        <label for="completed">Completed?</label>
        <input type="checkbox" id="completed" name="completed" checked="" value="1">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add task</button>
      </div>

      @include('layouts.errors')

    </form>

  </div>
