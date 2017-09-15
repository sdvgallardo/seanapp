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

  @yield('archives')

  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="https://github.com/sdvgallardo">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->
