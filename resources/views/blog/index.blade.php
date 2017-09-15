@extends ('layouts.blog.master')

@section ('content')

    <div class="col-sm-8 blog-main">

    @include ('layouts.blog.posts')

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
