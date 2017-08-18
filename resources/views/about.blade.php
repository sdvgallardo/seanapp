<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About!</title>

    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
@include('layouts.nav')
  <body>
    <h1>
      @include('layouts.about')
    </h1>
  </body>
