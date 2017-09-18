@extends('layouts.blog.master')

@section ('content')

  @include('layouts.blog.sidebar')
  <div class="col-sm-8 blog-main">
    <h1>Edit User</h1>
    <hr>
    @if ( Auth::user()->name == $post->user->name )
      <form method="POST" action="/blog/edit/post/{{ $post->id }}" >
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
          <label for="body">Bio</label>
          <textarea id="bio" name="bio" class="form-control" style="height: 200px">{{ $user->bio }}</textarea>
        </div>

        <div class="form-group">
          <label for="title">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ $user->location }}">
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
