@extends('layouts.app')

@section('title', 'Movie List')

@section('content')

    @if (session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif

    @if ($movies === 'all')
        <P>Showing all movies</P>
    @endif

    <h3>Filter By Genre</h3>
    <a href="{{ route('movies.index') }}">All</a> |
    <a href="{{ route('movies.index', ['activeGenre' => 'Action']) }}"> Action</a> |
    <a href="{{ route('movies.index', ['activeGenre' => 'Animation']) }}"> Animation</a> |
    <a href="{{ route('movies.index', ['activeGenre' => 'Drama']) }}"> Drama</a> |
    <a href="{{ route('movies.index', ['activeGenre' => 'Sports']) }}"> Sports</a>
    <a href="{{ route('movies.index', ['activeGenre' => 'Fantasy']) }}"> Fantasy</a> |

    <h3>Filter By Year</h3>
    <a href="{{ route('movies.index') }}">All</a> |
    <a href="{{ route('movies.index', ['year' => 2011]) }}"> 2011</a> |
    <a href="{{ route('movies.index', ['year' => 2016]) }}"> 2016</a> |
    <a href="{{ route('movies.index', ['year' => 2018]) }}"> 2018</a> |
    <a href="{{ route('movies.index', ['year' => 2019]) }}"> 2019</a> |
    <a href="{{ route('movies.index', ['year' => 2020]) }}"> 2020</a> |
    <a href="{{ route('movies.index', ['year' => 2021]) }}"> 2021</a>

    <a href="{{ route('movies.index') }} ">Clear Filters</a>


    <h2>Movie List</h2>

    <table class="table table-striped table-bordered align-middle">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Year</th>
            <th>Now Showing</th>
        </tr>

        @forelse ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></td>
                <td>{{ $movie['genre'] }}</td>
                <td>
                    {{ $movie['rating'] }}
                    @if ($movie['rating'] >= 8.7)
                        <span class="badge text-bg-success">Top Rated</span>
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
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">There are no movies to display right now.</td>
            </tr>
        @endforelse

    </table>
@endsection
