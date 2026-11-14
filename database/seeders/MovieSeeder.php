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

        Movie::firstOrCreate(
            ['title' => 'Anohana: The Flower We Saw That Day'],
            ['genre_id' => $drama->id, 'rating' => 8.1, 'year' => 2011, 'is_nowshowing' => true],
        );

        Movie::firstOrCreate(
            ['title' => 'A Silent Voice'],
            ['genre_id' => $drama->id, 'rating' => 8.5, 'year' => 2016, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Your Name'],
            ['genre_id' => $romance->id, 'rating' => 8.4, 'year' => 2016, 'is_nowshowing' => true],
        );

        Movie::firstOrCreate(
            ['title' => 'Weathering with You'],
            ['genre_id' => $fantasy->id, 'rating' => 7.5, 'year' => 2019, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Hello World'],
            ['genre_id' => $drama->id, 'rating' => 6.7, 'year' => 2019, 'is_nowshowing' => true],
        );

        Movie::firstOrCreate(
            ['title' => 'Demon Slayer: Kimetsu no Yaiba - The Movie: Mugen Train'],
            ['genre_id' => $action->id, 'rating' => 8.2, 'year' => 2020, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Violet Evergarden: The Movie'],
            ['genre_id' => $drama->id, 'rating' => 8.3, 'year' => 2020, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Josee, the Tiger and the Fish'],
            ['genre_id' => $romance->id, 'rating' => 7.6, 'year' => 2020, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Jujutsu Kaisen 0'],
            ['genre_id' => $action->id, 'rating' => 7.8, 'year' => 2021, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Belle'],
            ['genre_id' => $fantasy->id, 'rating' => 7.1, 'year' => 2021, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Words Bubble Up Like Soda Pop'],
            ['genre_id' => $romance->id, 'rating' => 6.9, 'year' => 2021, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'One Piece Film: Red'],
            ['genre_id' => $action->id, 'rating' => 6.9, 'year' => 2022, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'The First Slam Dunk'],
            ['genre_id' => $sports->id, 'rating' => 8.2, 'year' => 2022, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Suzume'],
            ['genre_id' => $fantasy->id, 'rating' => 7.6, 'year' => 2022, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'The Boy and the Heron'],
            ['genre_id' => $fantasy->id, 'rating' => 7.4, 'year' => 2023, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Blue Giant'],
            ['genre_id' => $drama->id, 'rating' => 7.9, 'year' => 2023, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Look Back'],
            ['genre_id' => $drama->id, 'rating' => 7.9, 'year' => 2024, 'is_nowshowing' => false],
        );

        Movie::firstOrCreate(
            ['title' => 'Haikyu!! The Dumpster Battle'],
            ['genre_id' => $sports->id, 'rating' => 7.8, 'year' => 2024, 'is_nowshowing' => false],
        );
    }
}
