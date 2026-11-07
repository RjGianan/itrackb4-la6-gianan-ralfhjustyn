<div class="mb-3">
    @error('title')
        <div class="text-danger mb-2">{{ $message }}</div>
    @enderror
    <label class="form-label archive-label" for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
</div>
<div class="mb-3">
    <label class="form-label archive-label" for="genre_id">Genre</label>
    <select class="form-select" id="genre_id" name="genre_id" required>
        <option value="">Select genre</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" @selected(old('genre_id', $movie->genre_id) == $genre->id)>{{ $genre->name }}</option>
        @endforeach
    </select>
    @error('genre_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label archive-label" for="rating">Rating</label>
        <input type="number" class="form-control" id="rating" name="rating" value="{{ old('rating', $movie->rating) }}" step="0.1" min="0" max="10" required>
        @error('rating')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label archive-label" for="year">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $movie->year) }}" min="2000" max="2026" required>
        @error('year')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="mb-4">
    <label class="form-label archive-label" for="is_nowshowing">Now showing</label>
    <select class="form-select" id="is_nowshowing" name="is_nowshowing" required>
        <option value="">Select an option</option>
        <option value="1" @selected((string) old('is_nowshowing', (int) $movie->is_nowshowing) === '1')>Yes</option>
        <option value="0" @selected((string) old('is_nowshowing', (int) $movie->is_nowshowing) === '0')>No</option>
    </select>
    @error('is_nowshowing')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>