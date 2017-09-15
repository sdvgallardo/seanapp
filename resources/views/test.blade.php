
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="/css/blog.css" rel="stylesheet">

    <title>Test!</title>


  </head>

  @include('layouts.nav')

  <body>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Sean's Test Space</h1>
      </div>
    </div>

    <div class="container">
      <div class = "row">
        <div class="col-sm-8 blog-main">

          This section is for testing

        </div>
        @include('layouts.blog.sidebar')

      </div> <!-- row -->
    </div> <!-- container -->

    @include('layouts.blog.footer')

  </body>

</html>
