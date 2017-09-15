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
          <a href="/blog/tag/{{ $tag['name'] }}">
            {{ $tag['name'] }}</a>
            ({{ $tag['number'] }})
        </li>
      @endforeach
    </ol>
  </div>
