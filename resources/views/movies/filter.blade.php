@extends('layouts.app')

@section('title', 'Filter Movies')

@section('content')
    <section class="archive-card p-3 p-md-4">
        <div class="archive-eyebrow">Movie collection</div>
        <h2 class="h3 mb-1">Browse by genre</h2>
        <p class="archive-subtitle small mb-3">Explore the movies in a selected genre.</p>

        @if ($activeGenre)
            <div class="filter-summary small p-2 mb-3">
                <strong>Active filter:</strong> Genre: {{ $activeGenre }}
                <a class="ms-2" href="{{ route('movies.filter') }}">Clear filter</a>
            </div>
        @else
            <p class="filter-summary small p-2 mb-3"><strong>Active filter:</strong> All genres</p>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle archive-table">
                <thead>
                    <tr>
                        <th>Movie title</th>
                        <th>Genre</th>
                        <th>Rating</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td><a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></td>
                            <td>{{ $movie->genre->name }}</td>
                            <td>{{ $movie['rating'] }}</td>
                            <td>{{ $movie['year'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No movies found for this genre.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a class="btn btn-outline-secondary btn-sm" href="{{ route('movies.index') }}">Back to movie archive</a>
    </section>
@endsection
