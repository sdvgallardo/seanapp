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

  </div>
@endsection
