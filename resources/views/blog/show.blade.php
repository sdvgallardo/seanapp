@extends('layouts.blog.master')

@section ('content')

  <div class="col-sm-8 blog-main">

    <i><a href="/blog">Back to Main</a></i>
    <h1>
      {{ $post->title }}
    </h1>

    <p class="blog-post-meta">
      Created by {{ $post->user->name }}
      on {{ $post->created_at->toFormattedDateString() }}
    </p>

    {{ $post-> body }}

    <hr>
    <div class="comments">
      <ul class="list-group">
        @foreach ($post->comments as $comment)
          <article>
            <li class ="list-group-item">
              <text class="blog-post-meta"> <i>{{ $comment->user->name }} ({{ $comment->created_at->diffForHumans() }}): </i></text>
                {{ $comment->body }}
            </li>
          </article>
        @endforeach
      </ul>
    </div>

    @if (Auth::guest())
    <div>
      <a href = "{{ route('login') }}"><button type="login" class="btn btn-primary">Sign in to add a comment!</button></a>
    </div>
    @else
    <hr>
    <div class="card-block">

        <form method="POST" action="/blog/{{ $post->id }}/comments">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="body" placeholder="Your comment here" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
          </div>
        </form>
        @include('layouts.errors')
    </div>
    @endif





  </div>
@endsection
