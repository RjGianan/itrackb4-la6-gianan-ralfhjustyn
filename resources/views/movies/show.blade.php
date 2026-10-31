@extends('layouts.app')

@section('title', $movies['title'])

@section('content')
    <section class="archive-card p-3 p-md-4">
        <div class="archive-eyebrow">Movie details</div>
        <h2 class="h3 mb-1">{{ $movies['title'] }}</h2>
        <p class="archive-subtitle small mb-4">Full information for this movie in the collection.</p>

        <dl class="row mb-4">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $movies['id'] }}</dd>
            <dt class="col-sm-3">Genre</dt>
            <dd class="col-sm-9">{{ $movies->genre->name }}</dd>
            <dt class="col-sm-3">Rating</dt>
            <dd class="col-sm-9">{{ $movies['rating'] }} / 10</dd>
            <dt class="col-sm-3">Year</dt>
            <dd class="col-sm-9">{{ $movies['year'] }}</dd>
            <dt class="col-sm-3">Now showing</dt>
            <dd class="col-sm-9">{{ $movies['is_nowshowing'] ? 'Yes' : 'No' }}</dd>
        </dl>

        <a class="btn btn-primary btn-sm" href="{{ route('movies.index') }}">Back to movie archive</a>
    </section>
@endsection
