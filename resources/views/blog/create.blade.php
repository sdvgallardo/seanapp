@include('layouts.nav')

@extends('layouts.master')

@section ('content')

  <div class="col-sm-8 blog-main">
    <h1>Create a post</h1>

    <hr>

    <form method="POST" action="/blog" >
      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>

      <div class="form-group">
        <label for="body">Body</label>
        <textarea id="body" name="body" class="form-control"></textarea>
      </div>

<!--
      <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>
-->

      <button type="submit" class="btn btn-primary">Publish</button>
    </form>
  </div>

@endsection
