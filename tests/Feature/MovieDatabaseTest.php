<?php

namespace Tests\Feature;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_movie_form_stores_a_movie_with_its_genre_id(): void
    {
        $genre = Genre::create(['name' => 'Drama']);

        $response = $this->post(route('movies.store'), [
            'title' => 'A Test Movie',
            'genre_id' => $genre->id,
            'rating' => 8.2,
            'year' => 2020,
            'is_nowshowing' => '0',
        ]);

        $response->assertRedirect(route('movies.index'));
        $this->assertDatabaseHas('movies', [
            'title' => 'A Test Movie',
            'genre_id' => $genre->id,
            'is_nowshowing' => 0,
        ]);
    }

    public function test_missing_genre_returns_to_form_with_other_values_preserved(): void
    {
        $genre = Genre::create(['name' => 'Drama']);

        $response = $this->from(route('movies.create'))
            ->post(route('movies.store'), [
                'title' => 'Retained Movie Title',
                'rating' => 8.2,
                'year' => 2020,
                'is_nowshowing' => '0',
            ]);

        $response->assertRedirect(route('movies.create'));
        $this->followRedirects($response)
            ->assertOk()
            ->assertSee('The genre id field is required.')
            ->assertSee('value="Retained Movie Title"', false)
            ->assertSee('value="0" selected', false);
    }

    public function test_selected_genre_is_preserved_after_another_validation_error(): void
    {
        $genre = Genre::create(['name' => 'Drama']);

        $response = $this->from(route('movies.create'))
            ->post(route('movies.store'), [
                'title' => 'Retained Movie Title',
                'genre_id' => $genre->id,
                'rating' => 11,
                'year' => 2020,
                'is_nowshowing' => '0',
            ]);

        $response->assertRedirect(route('movies.create'));
        $this->followRedirects($response)
            ->assertOk()
            ->assertSee('The rating field must not be greater than 10.')
            ->assertSee('value="'.$genre->id.'" selected', false)
            ->assertSee('value="Retained Movie Title"', false);
    }

    public function test_movie_list_applies_optional_genre_and_year_filters(): void
    {
        $drama = Genre::create(['name' => 'Drama']);
        $romance = Genre::create(['name' => 'Romance']);

        Movie::create([
            'title' => 'Drama Movie',
            'genre_id' => $drama->id,
            'rating' => 8,
            'year' => 2020,
            'is_nowshowing' => true,
        ]);
        Movie::create([
            'title' => 'Romance Movie',
            'genre_id' => $romance->id,
            'rating' => 7,
            'year' => 2021,
            'is_nowshowing' => false,
        ]);

        $this->get(route('movies.index'))
            ->assertOk()
            ->assertSee('Drama Movie')
            ->assertSee('Romance Movie');

        $this->get(route('movies.index', ['genre_id' => $drama->id]))
            ->assertOk()
            ->assertSee('Drama Movie')
            ->assertDontSee('Romance Movie');

        $this->get(route('movies.index', ['year' => 2021]))
            ->assertOk()
            ->assertSee('Romance Movie')
            ->assertDontSee('Drama Movie');
    }
}
