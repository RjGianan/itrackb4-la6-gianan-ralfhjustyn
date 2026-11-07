@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
    <section class="archive-card p-3 p-md-4">
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
            <div>
                <div class="archive-eyebrow">Movie collection</div>
                <h2 class="h3 mb-1">My Movie List</h2>
                <p class="archive-subtitle small mb-0">Browse the collection or select a movie to view its details.</p>
            </div>
            <a class="btn btn-primary btn-sm" href="{{ route('movies.create') }}">Add a movie</a>
        </div>

        <div class="filter-summary small p-2 mb-3">
            <strong>Active filters:</strong>
            Genre: {{ $genres->firstWhere('id', request()->query('genre_id'))?->name ?? 'All genres' }}
            <span class="mx-1">|</span>
            Year: {{ request()->query('year') ?: 'All years' }}
        </div>

        <div class="mb-3">
            <h3 class="h6 mb-2">Filter by genre</h3>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-sm filter-chip {{ request()->query('genre_id') ? '' : 'active' }}"
                   href="{{ route('movies.index', request()->only('year')) }}">All genres</a>
                @foreach ($genres as $genre)
                    <a class="btn btn-sm filter-chip {{ (string) request()->query('genre_id') === (string) $genre->id ? 'active' : '' }}"
                       href="{{ route('movies.index', array_merge(request()->only('year'), ['genre_id' => $genre->id])) }}">{{ $genre->name }}</a>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <h3 class="h6 mb-2">Filter by year</h3>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-sm filter-chip {{ request()->query('year') ? '' : 'active' }}"
                   href="{{ route('movies.index', request()->only('genre_id')) }}">All years</a>
                @foreach ([2011, 2016, 2018, 2019, 2020, 2021] as $year)
                    <a class="btn btn-sm filter-chip {{ (string) request()->query('year') === (string) $year ? 'active' : '' }}"
                       href="{{ route('movies.index', array_merge(request()->only('genre_id'), ['year' => $year])) }}">{{ $year }}</a>
                @endforeach
            </div>
        </div>

        @if (request()->query('genre_id') || request()->query('year'))
            <p class="mb-3"><a href="{{ route('movies.index') }}">Clear both filters</a></p>
        @endif

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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
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
                            <td>
                                <a href="{{ route('movies.edit', $movie['id']) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('movies.destroy', $movie['id']) }}" method="POST"
                                onsubmit="return confirm('Delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">There are no movies to display right now.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
