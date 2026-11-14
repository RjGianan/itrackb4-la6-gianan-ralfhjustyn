@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="archive-card p-3 p-md-4">
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
            <div>
                <div class="archive-eyebrow">Welcome to the Movie Collection</div>
                <h2 class="h3 mb-1">Home</h2>
                <p class="archive-subtitle small mb-0">Browse the collection or select a movie to view its details.</p>
                <h1 class="h6 mb-0">Hello, This is my Movie Collection</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3 class="h6 mb-2">Counts</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Movies
                    <span class="badge bg-primary rounded-pill">{{ $movieCount }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Genres
                    <span class="badge bg-primary rounded-pill">{{ $genreCount }}</span>
                </li>
            </ul>
        </div>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Browse Movies</a>

                <div class="d-flex align-items-center gap-3 mb-4">
            <img src="{{ asset('img/profile.jpg') }}" width="96" height="96" class="rounded-circle" alt="Photo of Ralfh Justyn V. Gianan">
            <div>
                <h3 class="h6 mb-1">Ralfh Justyn V. Gianan</h3>
                <p class="mb-0">BSIT - 4th Year - Block C</p>
            </div>
        </div>

    </section>
@endsection