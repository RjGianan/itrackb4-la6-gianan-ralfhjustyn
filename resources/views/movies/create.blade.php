@extends('layouts.app')

@section('title', 'Add a Movie')

@section('content')
    <section class="archive-card p-3 p-md-4">
        <div class="archive-eyebrow">Movie collection</div>
        <h2 class="h3 mb-1">Add a new movie</h2>
        <p class="archive-subtitle small mb-4">Enter the movie details below.</p>

        <form method="POST" action="{{ route('movies.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label archive-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label archive-label" for="genre_id">Genre</label>
                <select class="form-select" id="genre_id" name="genre_id" required>
                    <option value="">Select genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label archive-label" for="rating">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" step="0.1" min="0" max="10" required>
                    @error('rating')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label archive-label" for="year">Year</label>
                    <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" min="2000" max="2026" required>
                    @error('year')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label archive-label" for="is_nowshowing">Now showing</label>
                <select class="form-select" id="is_nowshowing" name="is_nowshowing" required>
                    <option value="">Select an option</option>
                    <option value="1" @selected(old('is_nowshowing') === '1')>Yes</option>
                    <option value="0" @selected(old('is_nowshowing') === '0')>No</option>
                </select>
                @error('is_nowshowing')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add movie</button>
            <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </section>
@endsection