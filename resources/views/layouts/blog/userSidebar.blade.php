<div class="col-sm-3 offset-sm-1 blog-sidebar">

  @if ( Auth::check() )
    @if ( Auth::user()->id == $user->id )
      <div class="sidebar-module">
        <a href = '/blog/edit/user={{ $user->id }}'><button type="edit" class="btn btn-primary">Edit Profile</button></a>
        <br>
      </div>
    @endif
  @endif


  <div class="sidebar-module sidebar-module-inset">
    <h4><b>{{ $user->name }}</b></h4>
    @if ($user->avatar)
      <img src="{{ $user->avatar }}" style="width:150px;height:auto">
    @endif
    <hr>
    <ol class="list-unstyled">
      <li> <i>Joined:</i> {{ $user->created_at->toFormattedDateString() }} </li>
      <li> <i>Posts:</i> {{ $user->posts->count() }}</li>
      <li> <i>Location:</i> {{ $user->location }} </li>
      <hr>
      <li> <i>Bio:</i> {{ $user->bio }} </li>
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
      <li><a href="/blog/user={{ $user->id }}">All</a></li>
      @foreach ($archives as $stats)
        <li>
          <a href="/blog/archive/{{ $stats['month'] }}/{{ $stats['year'] }}/user={{ $stats['user'] }}">
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
          <a href="/blog/tag={{ $tag['name'] }}/user={{ $tag['user'] }}">
            {{ $tag['name'] }}</a>
            ({{ $tag['number'] }})
        </li>
      @endforeach
    </ol>
    <a href = "/blog"> << Back to main blog </a>

  </div>

</div>
