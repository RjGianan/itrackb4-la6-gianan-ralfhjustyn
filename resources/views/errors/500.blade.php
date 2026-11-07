@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
    <section class="archive-card p-3 p-md-4">
        <h1>Something went wrong</h1>
        <p>An unexpected error occurred. Please try again later.</p>
        <a href="{{ route('movies.index') }}">Back to the list</a>
    </section>
@endsection
