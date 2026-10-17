<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'genre' => 'required|string|max:100',
            'rating' => 'required|numeric|Min:0|max:10',
            'year' => 'required|integer|min:2000|max:2026',
            'is_nowshowing' => 'required|boolean',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movies= Movie::findOrFail($id);

        return view('movies.show', compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter(?string $genre = null)
    {
        $query = Movie::query();

        if ($genre !== null) {
            $query->where('genre', $genre);
        }

        $movies = $query->get();

        return view('movies.filter', ['movies' => $movies, 'activeGenre' => $genre]);
    }
}
