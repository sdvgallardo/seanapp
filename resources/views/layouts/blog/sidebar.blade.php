<div class="col-sm-3 offset-sm-1 blog-sidebar">

  @if (Auth::check())
    <div class="sidebar-module">
      <a href = '/blog/create'><button type="create" class="btn btn-primary">Create Post</button></a>
    </div>
  @else
    <div class="sidebar-module">
      <a href = "{{ route('login') }}"><button type="login" class="btn btn-primary">Sign in to post</button></a>
    </div>
  @endif

  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p> @include('layouts.about') </p>
  </div>

  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
      <li><a href="/blog">All</a></li>
      @foreach ($archives as $stats)
        <li>
          <a href="/blog/archive/{{ $stats['month'] }}/{{ $stats['year'] }}">
            {{ $stats['month'] . ' ' . $stats['year'] }}</a>
            ({{ $stats['published'] }})
        </li>
      @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">
      @foreach ($tags as $tag)
        <li>
          <a href="/blog/tag={{ $tag['name'] }}">
            {{ $tag['name'] }}</a>
            ({{ $tag['number'] }})
        </li>
      @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="https://github.com/sdvgallardo">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->
