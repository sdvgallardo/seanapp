<nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Sean</a>

  <div class="collapse navbar-collapse" id="navbarsExample02">


      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="/tasks">Tasks</a></li>
        <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="/test">Test</a><li>
        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
      </ul>

      @if (Auth::guest())
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
      </ul>
      @else
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link">{{ Auth::user()->name }}</a></li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        </li>
      </ul>

    @endif

  </div>
</nav>
<br>
