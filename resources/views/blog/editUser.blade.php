@extends('layouts.blog.master')

@section ('links')

  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

@endsection

<title>{{ $user->name }}'s Blog!</title>

@section ('content')

  @include('layouts.blog.userSidebar')
  <div class="col-sm-8 blog-main">
    <h1>Edit User</h1>
    <hr>
    @if ( Auth::user()->id == $user->id )
      <form method="POST" action="/blog/edit/user={{ $user->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
          <label for="bio">Bio</label>
          <textarea id="bio" name="bio" class="form-control" rows="10" cols="80">{{ $user->bio }}</textarea>
          <script>
              CKEDITOR.replace( 'bio' );
          </script>
        </div>

        <div class="form-group">
          <label for="location">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ $user->location }}">
        </div>

        <div class="form-group">
          <label for="avatar">Upload an avatar</label>
          <br>
          <input type="file" name="avatar"></input>
        </div>

        <div class="form-group">
          <button type="save" class="btn btn-primary">Save</button>
        </div>

        @include('layouts.errors')
      </form>

    @else
      You cannot edit this user
    @endif

  </div>

@endsection
