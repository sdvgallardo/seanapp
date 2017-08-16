<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Task {{ $task->id }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
  </head>

  @include('layouts.nav')

  <body>

      <div class="container">
      <div class = "row">
        <div class="col-sm-8 blog-main">
          <h2>
          {{ $task->body }}
        </h>
          <p class="blog-post-meta">
            Created on: {{ $task->created_at->toFormattedDateString() }}
            <br>
            @if( $task->completed )
              Completed on: {{ $task->updated_at->toFormattedDateString() }}
            @else
              Not Completed
            @endif
          </p>

      </div> <!-- row -->
    </div> <!-- container -->

  </body>

</html>
