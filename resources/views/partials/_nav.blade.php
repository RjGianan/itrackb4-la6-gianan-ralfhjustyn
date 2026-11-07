<nav class="nav archive-nav gap-1">
    <a class="nav-link text-white {{ request()->routeIs('movies.index') ? 'active' : '' }}" href="{{ route('movies.index') }}">All Movies</a>
    <a class="nav-link text-white" href="{{ route('movies.create') }}">Add Movie</a>
</nav>