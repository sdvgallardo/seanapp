@extends('layouts.blog.master')

@section ('links')

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
    <h1>Edit this post</h1>
    <hr>
    @if ( Auth::user()->name == $post->user->name )
      <form method="POST" action="/blog/edit/post/{{ $post->id }}" >
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
          <label for="body">Body</label>
          <textarea id="body" name="body" class="form-control" style="height: 200px">{{ $post->body }}</textarea>
        </div>

        <div class="form-group">
          <label for "tags">Tags</label>
          <input type="text" class="form-control" id="tags" name="tags" data-role="tagsinput" value="@foreach($tags as $tag){{ $tag['name'] }},@endforeach">
        </div>

        <div class="form-group">
          <button type="save" class="btn btn-primary">Save</button>
        </div>

        @include('layouts.errors')
      </form>

    @else
      You cannot edit this post
    @endif
    
  </div>

@endsection
