@extends ('layouts.app')

@section('title', 'Add Movies')

@section('content') 
  
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Add a New Movie</h2>
        </div>
    </div>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>

            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>  
        <div class="mb-3">
            <label for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre" required>
                <option value="">Select Genre</option>
                <option value="Action" @selected(old('genre') === 'Action')>Action</option>
                <option value="Animation" @selected(old('genre') === 'Animation')>Animation</option>
                <option value="Drama" @selected(old('genre') === 'Drama')>Drama</option>
                <option value="Sports" @selected(old('genre') === 'Sports')>Sports</option>
                <option value="Fantasy" @selected(old('genre') === 'Fantasy')>Fantasy</option>
            </select>
            @error('genre')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" step="0.1" min="0" max="10" required>
            @error('rating')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" min="2000" max="2026" required>
            @error('year')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="is_nowshowing">Now Showing</label>
            <select class="form-control" id="is_nowshowing" name="is_nowshowing" required>
                <option value="">Select Option</option>
                <option value="1" @selected(old('is_nowshowing') === '1')>Yes</option>
                <option value="0" @selected(old('is_nowshowing') === '0')>No</option>
            </select>
            @error('is_nowshowing')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button> 
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form> 
@endsection