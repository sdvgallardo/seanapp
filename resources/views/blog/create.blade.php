@extends('layouts.blog.master')

@section ('links')

  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap-tagsinput.js"></script>
  <link href="/css/bootstrap-tagsinput.css" rel="stylesheet">

@endsection

@section ('javascript')

  <script type="text/javascript">
    $(function() {
      $('#tags').val();
    });

  </script>

@endsection

@section ('content')

  @include('layouts.blog.sidebar')

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
        <textarea id="body" name="body" class="form-control" rows="10" cols="80"></textarea>
        <script>
            CKEDITOR.replace( 'body' );
        </script>
      </div>

      <div class="form-group">
      <label for "tags">Tags</label>
        <input type="text" class="form-control" id="tags" name="tags" data-role="tagsinput" >
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
      </div>

      @include('layouts.errors')

    </form>

  </div>

@endsection
