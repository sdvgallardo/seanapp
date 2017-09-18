<div class="col-sm-3 offset-sm-1 blog-sidebar">

  <div class="sidebar-module">
  @if ( Auth::user()->id == $user->id )
    <a href = '/blog/edit/user/{{ $user->id }}'><button type="edit" class="btn btn-primary">Edit Profile</button></a>
  @endif
  </div>

  <div class="sidebar-module sidebar-module-inset">
    <h4><b>{{ $user->name }}</b></h4>
    <ol class="list-unstyled">
      <li> <i>Joined:</i> {{ $user->created_at->toFormattedDateString() }} </li>
      <li> <i>Posts:</i> {{ $posts->total() }}</li>
      <li> <i>Location:</i> {{ $user->location }} </li>
      <hr>
      <li> <i>Bio:</i> {{ $user->bio }} </li>
    </ol>
  </div>

</div>
