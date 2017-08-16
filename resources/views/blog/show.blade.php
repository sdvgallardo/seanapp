@extends('layouts.blog.master')

@section ('content')

  <div class="col-sm-8 blog-main">

    <h1>
      {{ $post->title }}
    </h1>

    <p class="blog-post-meta">
      {{ $post->created_at->toFormattedDateString() }}
    </p>

    {{ $post-> body }}

    <hr>
    <div class="comments">
      <ul class="list-group">
        @foreach ($post->comments as $comment)
          <article>
            <li class ="list-group-item">
              <strong>
                {{ $comment->created_at->diffForHumans() }}:
              </strong>
              {{ $comment->body }}
            </li>
          </article>
        @endforeach
      </ul>
    </div>


    <hr>



    <div class="card-block">

        <form method="POST" action="/blog/{{ $post->id }}/comments">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="body" placeholder="Your comment here" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
          </div>
        </form>
        @include('layouts.errors')

    </div>



  </div>
@endsection
