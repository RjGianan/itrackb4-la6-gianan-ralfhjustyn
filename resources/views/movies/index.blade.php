@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
    <section class="archive-card p-3 p-md-4">
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
            <div>
                <div class="archive-eyebrow">Movie collection</div>
                <h2 class="h3 mb-1">My Movie List</h2>
                <p class="archive-subtitle small mb-0">Browse the collection or select a movie to view its details.</p>
            </div>
            @can('create', App\Models\Movie::class)
                <a class="btn btn-primary btn-sm" href="{{ route('movies.create') }}">Add a movie</a>
            @endcan

            @cannot('create', App\Models\Movie::class)
                <p class="text-muted small">You are viewing this list in read-only mode.</p>
            @endcannot

        </div>

        <form method="GET" action="{{ route('movies.index') }}" class="row g-2 align-items-end mb-3">
            <div class="col-md-3">
                <label for="movie-search" class="form-label">Search titles</label>
                <input type="text" id="movie-search" name="search" class="form-control" value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label for="genre-filter" class="form-label">Genre</label>
                <select id="genre-filter" name="genre_id" class="form-select">
                    <option value="">All genres</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(request('genre_id') == $genre->id)>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="showing-filter" class="form-label">Now showing</label>
                <select id="showing-filter" name="is_nowshowing" class="form-select">
                    <option value="" @selected(request('is_nowshowing') === null || request('is_nowshowing') === '')>Any</option>
                    <option value="1" @selected(request('is_nowshowing') === '1')>Yes</option>
                    <option value="0" @selected(request('is_nowshowing') === '0')>No</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="year-filter" class="form-label">Year</label>
                <select id="year-filter" name="year" class="form-select">
                    <option value="">Any year</option>
                    @foreach ([2011, 2016, 2018, 2019, 2020, 2021] as $year)
                        <option value="{{ $year }}" @selected(request('year') == $year)>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="sort-filter" class="form-label">Sort by</label>
                <select id="sort-filter" name="sort" class="form-select">
                    <option value="title" @selected($sortBy === 'title')>Title</option>
                    <option value="year" @selected($sortBy === 'year')>Year</option>
                </select>
            </div>
            <div class="col-md-1 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
            <div class="col-12">
                <a href="{{ route('movies.index') }}">Clear filters</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle archive-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Movie title</th>
                        <th>Genre</th>
                        <th>Rating</th>
                        <th>Year</th>
                        <th>Now showing</th>
                        @can('create', App\Models\Movie::class)
                            <th>Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td>{{ $movies->firstItem() + $loop->index }}</td>
                            <td><a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></td>
                            <td>{{ $movie->genre->name }}</td>
                            <td>
                                {{ $movie['rating'] }}
                                @if ($movie['rating'] >= 8.7)
                                    <span class="badge text-bg-success">Top rated</span>
                                @endif
                            </td>
                            <td>{{ $movie['year'] }}</td>
                            <td>
                                @if ($movie['is_nowshowing'] ?? false)
                                    <span class="badge text-bg-success">Yes</span>
                                @else
                                    <span class="badge text-bg-secondary">No</span>
                                @endif
                            </td>
                            @can('create', App\Models\Movie::class)
                                <td>
                                    @can('update', $movie)
                                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    @endcan

                                    @can('delete', $movie)
                                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Delete this record?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->check() ? 7 : 6 }}" class="text-center py-4">There are no movies to display right now.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $movies->links() }}
    </section>
@endsection
