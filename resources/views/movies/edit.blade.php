@extends('layouts.app')

@section('title', 'Edit a Movie')

@section('content')
    <div class="card">
        <div class="card-header">Edit Movie</div>
        <div class="card-body">
            <form action="{{ route('movies.update', $movie) }}" method="POST" novalidate>
                @csrf
                @method('PUT')
                @include('movies._form')
                <a class="btn btn-secondary" href="{{ route('movies.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Movie</button>
            </form>
        </div>
    </div>
@endsection
