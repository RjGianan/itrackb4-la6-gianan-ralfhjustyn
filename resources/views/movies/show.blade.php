@extends('layouts.app')

@section('title', $movies['title'])

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $movies['title'] }}</h2>

            <p><strong>ID:</strong> {{ $movies['id'] }}</p>
            <p><strong>Title:</strong> {{ $movies['title'] }}</p>
            <p><strong>Genre:</strong> {{ $movies['genre'] }}</p>
            <p><strong>Rating:</strong> {{ $movies['rating'] }} / 10</p>
            <p><strong>Year:</strong> {{ $movies['year'] }}</p>
            <p><strong>Now Showing:</strong> {{ $movies['is_nowshowing'] ? 'Yes' : 'No' }}</p>

            <a class="btn btn-primary" href="{{ route('movies.index') }}">Back to Movie List</a>
        </div>
    </div>
@endsection
