<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Anohana: The Flower We Saw That Day',
            'genre' => 'Drama',
            'rating' => 8.1,
            'year' => 2011,
            'is_nowshowing' => true,
        ]);

        Movie::create([
            'title' => 'A Silent Voice',
            'genre' => 'Drama',
            'rating' => 8.5,
            'year' => 2016,
            'is_nowshowing' => false,
        ]);

        Movie::create([
            'title' => 'Your Name',
            'genre' => 'Romance',
            'rating' => 8.4,
            'year' => 2016,
            'is_nowshowing' => true,
        ]);

        Movie::create([
            'title' => 'Weathering with You',
            'genre' => 'Fantasy',
            'rating' => 7.5,
            'year' => 2019,
            'is_nowshowing' => false,
        ]);

        Movie::create([
            'title' => 'Hello World',
            'genre' => 'Drama',
            'rating' => 6.7,
            'year' => 2019,
            'is_nowshowing' => true,
        ]);
    }
}
