@extends('layouts.blog.master')

@section ('content')

  @include('layouts.blog.sidebar')
  <div class="col-sm-8 blog-main">

    <i><a href="/blog">Back to Main</a></i>
    <h1>
      {{ $post->title }}
    </h1>

    <p class="blog-post-meta">
      Created by <a href="/blog/user={{ $post->user->id }}">{{ $post->user->name }}</a>
      on {{ $post->created_at->format('j M, g:i A') }}
      @if ( $post->updated_at != $post->created_at)
        | edited on {{ $post->updated_at->format('j M, g:i A') }} <br>
      @else
        |
      @endif
      @if ( Auth::check() )
        @if ( Auth::user()->id == $post->user->id )
          <a href = '/blog/edit/post={{ $post->id }}'>Edit this post</a>
        @endif
      @endif
    </p>

    {{ $post-> body }}

    <br>
    <br>

    <p class="blog-post-meta">
      @if($count = count($post->tags))
      <i>Tags: </i>
      <?php
        $i = 0;
        foreach($post->tags as $tag){
          echo "<a href=\"/blog/tag=$tag->name\"> $tag->name </a>";
          if ($i != $count-1){
            echo "| ";
          }
          $i++;
        }
      ?>
      @endif
    </p>

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
