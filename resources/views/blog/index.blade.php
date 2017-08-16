@extends ('layouts.blog.master')

@section ('content')

    <div class="col-sm-8 blog-main">

    @include ('layouts.blog.posts')

      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav>

    </div><!-- /.blog-main -->

@endsection
