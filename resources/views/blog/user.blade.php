@extends ('layouts.blog.master')

@section('sidebar')

  <div class="col-sm-3 offset-sm-1 blog-sidebar">
      <div class="sidebar-module sidebar-module-inset">
        <h4>{{ $user->name }}</h4>
        <p>Number of posts: {{ $posts->total() }}</p>
      </div>
  </div>

@endsection



@section ('content')

  <div class="col-sm-8 blog-main">
    @foreach ($posts as $post)
      <div class="blog-post">
        <h2 class="blog-post-title">
          {{$post->title}}
        </h2>

        <p class="blog-post-meta">
          Created by <a href="/blog/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
          on {{ $post->created_at->toFormattedDateString() }}

          @if($count = count($post->tags))
            <br>
            <i>Tags: </i>
            <?php
              $i = 0;
              foreach($post->tags as $tag){
                echo "$tag->name ";
                if ($i != $count-1) echo "| ";
                $i++;
              }
            ?>
          @endif
        </p>

        {{str_limit($post->body, 50)}}
        <i><a href="/blog/{{ $post->id }}">Read More</a></i>

      </div>
    @endforeach

  <nav class="blog-pagination">
    @if( $posts->currentPage() != 1 )
      <a class="btn btn-outline-secondary" href="{{ $posts->url(1) }}">First</a>
      <a class="btn btn-outline-primary" href=" {{ $posts->previousPageUrl() }} ">Previous</a>
    @endif
    @if( $posts->hasMorePages() )
      <a class="btn btn-outline-primary" href="{{ $posts->nextPageUrl() }}">Next</a>
      <a class="btn btn-outline-secondary" href="{{ $posts->url( $posts->lastPage() ) }}">Last</a>
    @endif
  </nav>

  </div><!-- /.blog-main -->

@endsection
