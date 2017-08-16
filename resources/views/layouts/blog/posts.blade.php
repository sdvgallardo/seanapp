@foreach ($posts as $post)

<div class="blog-post">

    <h2 class="blog-post-title">

      <a href="/blog/{{ $post->id }}">
        {{$post->title}}
      </a>

    </h2>

    <p class="blog-post-meta">

      {{ $post->created_at->toFormattedDateString() }}

    </p>

    {{ $post->body }}

</div>
@endforeach
