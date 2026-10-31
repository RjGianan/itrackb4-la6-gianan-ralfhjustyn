@extends('layouts.app')

@section('title', 'Featured Movie - ' . $movie['title'])

@section('content')
    <section class="archive-card p-3 p-md-4">
        <div class="archive-eyebrow">Featured title</div>
        <h2 class="h3 mb-1">{{ $movie['title'] }}</h2>
        <p class="archive-subtitle small mb-4">A featured movie from the collection.</p>

        <dl class="row mb-4">
            <dt class="col-sm-3">Genre</dt>
            <dd class="col-sm-9">{{ $movie->genre->name }}</dd>
            <dt class="col-sm-3">Rating</dt>
            <dd class="col-sm-9">{{ $movie['rating'] }} / 10</dd>
            <dt class="col-sm-3">Year</dt>
            <dd class="col-sm-9">{{ $movie['year'] }}</dd>
        </dl>

        <a class="btn btn-outline-secondary btn-sm" href="{{ route('movies.index') }}">Back to movie archive</a>
        <a class="btn btn-primary btn-sm" href="{{ route('movies.show', $movie['id']) }}">Full details</a>
    </section>
@endsection
