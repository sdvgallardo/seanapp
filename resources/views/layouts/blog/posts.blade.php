@foreach ($posts as $post)

<div class="blog-post">

    <h2 class="blog-post-title">
      {{$post->title}}
    </h2>

    <p class="blog-post-meta">
      Created by {{ $post->user->name }}
      on {{ $post->created_at->toFormattedDateString() }}
    </p>

    {{str_limit($post->body, 200)}}
    <br>
    <i><a href="/blog/{{ $post->id }}">Read More</a></i>

</div>
@endforeach
