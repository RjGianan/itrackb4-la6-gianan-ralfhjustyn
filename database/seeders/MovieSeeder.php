<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $action = Genre::firstOrCreate(['name' => 'Action']);
        $animation = Genre::firstOrCreate(['name' => 'Animation']);
        $drama = Genre::firstOrCreate(['name' => 'Drama']);
        $sports = Genre::firstOrCreate(['name' => 'Sports']);
        $fantasy = Genre::firstOrCreate(['name' => 'Fantasy']);
        $romance = Genre::firstOrCreate(['name' => 'Romance']);

        Movie::create([
            'title' => 'Anohana: The Flower We Saw That Day',
            'genre_id' => $drama->id,
            'rating' => 8.1,
            'year' => 2011,
            'is_nowshowing' => true,
        ]);

        Movie::create([
            'title' => 'A Silent Voice',
            'genre_id' => $drama->id,
            'rating' => 8.5,
            'year' => 2016,
            'is_nowshowing' => false,
        ]);

        Movie::create([
            'title' => 'Your Name',
            'genre_id' => $romance->id,
            'rating' => 8.4,
            'year' => 2016,
            'is_nowshowing' => true,
        ]);

        Movie::create([
            'title' => 'Weathering with You',
            'genre_id' => $fantasy->id,
            'rating' => 7.5,
            'year' => 2019,
            'is_nowshowing' => false,
        ]);

        Movie::create([
            'title' => 'Hello World',
            'genre_id' => $drama->id,
            'rating' => 6.7,
            'year' => 2019,
            'is_nowshowing' => true,
        ]);
    }
}
