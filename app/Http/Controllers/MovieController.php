<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genress = Genre::orderBy('name')->get();

        $genreId = $request->query('genre_id');
        $year = $request->query('year');

        $query = Movie::with('genre');

        if ($genreId !== null && $genreId !== '') {
            $query = $query->where('genre_id', $genreId);
        }

        if ($year !== null && $year !== '') {
            $query = $query->where('year', $year);
        }
        $movies = $query->get();

        return view('movies.index', compact('movies', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::orderBy('name')->get();

        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'genre_id' => 'required|integer|exists:genres,id',
            'rating' => 'required|numeric|min:0|max:10',
            'year' => 'required|integer|min:2000|max:2026',
            'is_nowshowing' => 'required|boolean',
        ]);

        $movie = Movie::create($validated);

        Log::info('Movie saved', [
            'id' => $movie->id,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */
   public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
    $genres = Genre::all();        // your lookup rows
    return view('movies.edit', compact('movie', 'genres'));
    
    }

    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'genre_id' => 'required|integer|exists:genres,id',
            'rating' => 'required|numeric|min:0|max:10',
            'year' => 'required|integer|min:2000|max:2026',
            'is_nowshowing' => 'required|boolean',
        ]);

        $movie->update($validated);

        Log::info('Movie updated', [
            'id' => $movie->id,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        abort_if($movie->genre->movies()->count() === 1, 403);

        $movie->delete();

        return redirect()->route('movies.index');
    }
}
