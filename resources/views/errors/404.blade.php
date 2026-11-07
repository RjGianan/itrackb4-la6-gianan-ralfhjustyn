@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <section class="archive-card p-3 p-md-4">
        <h1>Page not found</h1>
        <p>The page you are looking for could not be found.</p>
        <a href="{{ route('movies.index') }}">Back to the list</a>
    </section>
@endsection
