@foreach ($posts as $post)

<div class="blog-post">

    <h2 class="blog-post-title">
      {{$post->title}}
    </h2>

    <p class="blog-post-meta">
      Created by <a href="/blog/user={{ $post->user->id }}">{{ $post->user->name }}</a>
        on {{ $post->created_at->toFormattedDateString() }}
      @if($count = count($post->tags))
      <br>
      <i>Tags: </i>
      <?php
        $i = 0;
        foreach($post->tags as $tag){
          echo "$tag->name ";
          if ($i != $count-1){
            echo "| ";
          }
          $i++;
        }
      ?>
      @endif
    </p>

    {{str_limit($post->body, 200)}}
    <i><a href="/blog/post={{ $post->id }}">Read More</a></i>

</div>

@endforeach
