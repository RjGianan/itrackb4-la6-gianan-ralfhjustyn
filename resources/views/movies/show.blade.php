@extends('layouts.app')

@section('title', $movie['title'])

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $movie['title'] }}</h2>

            <p><strong>ID:</strong> {{ $movie['id'] }}</p>
            <p><strong>Title:</strong> {{ $movie['title'] }}</p>
            <p><strong>Genre:</strong> {{ $movie['genre'] }}</p>
            <p><strong>Rating:</strong> {{ $movie['rating'] }} / 10</p>
            <p><strong>Year:</strong> {{ $movie['year'] }}</p>
            <p><strong>Now Showing:</strong> {{ $movie['is_nowshowing'] ? 'Yes' : 'No' }}</p>

            <a class="btn btn-primary" href="{{ route('movies.index') }}">Back to Movie List</a>
        </div>
    </div>
@endsection
