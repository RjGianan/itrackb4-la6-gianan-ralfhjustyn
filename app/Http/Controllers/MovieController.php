<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $activeGenre = $request->query('activeGenre', 'all');
        $year = $request->query('year', 'all');

        $all = $this->movies();
        $movies = [];

            foreach ($all as $movie) {
                $MacthGenre = $activeGenre === 'all' || $movie['genre'] === $activeGenre;
                $MacthYear = $year === 'all' || (int)$movie['year'] === (int)$year;

                if ($MacthGenre && $MacthYear) {
                    $movies[] = $movie;
                }
            }

        return view('movies.index', ['movies' => $movies, 'activeGenre' => $activeGenre, 'year' => $year]);

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

        $movies = $this->movies();
        $id = count($movies) + 1;

        $movies[$id] = [
            'id' => $id,
            'title' => $validated['title'],
            'genre' => $validated['genre'],
            'rating' => $validated['rating'],
            'year' => $validated['year'],
            'is_nowshowing' => (bool) $validated['is_nowshowing'],
        ];

        $this->saveMovies($movies);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $movies = $this->movies();
        
        if (!isset($movies[$id])) {
            abort(404);
        }

        $movie = $movies[$id];
        return view('movies.show', ['movie' => $movie]);

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

     public function filter($genre = null)
    {
        $movies = $this->movies();

        if ($genre !== null) {
            $filtered = [];
            foreach ($movies as $movie) {
                if ($movie['genre'] === $genre) {
                    $filtered[$movie['id']] = $movie;
                }
            }
            $movies = $filtered;
        }

        return view('movies.filter', ['movies' => $movies, 'activeGenre' => $genre]);
    }

     private function Movies()
    {
       $path = storage_path('app/Movies.json');

       return json_decode(file_get_contents($path), true);
    }

    private function saveMovies($movies): void
    {
        file_put_contents(
            storage_path('app/Movies.json'),
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

}
