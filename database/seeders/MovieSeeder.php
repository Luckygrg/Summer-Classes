<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{

    public function run(): void
    {
        Movie::create([
            'name' => 'Fast & Furious',
            'description' => 'An action-packed street racing film.',
            'duration' => 2.15,
            'release_date' => '2009-04-03',
            'rating' => 7.2,
            'genre_id' => 1, // Action
            'language' => 'English',
            'cast' => 'Vin Diesel, Paul Walker, Michelle Rodriguez',
        ]);

        Movie::create([
            'name' => 'The Hangover',
            'description' => 'A comedy about a bachelor party gone wrong.',
            'duration' => 1.48,
            'release_date' => '2009-06-05',
            'rating' => 7.7,
            'genre_id' => 2, // Comedy
            'language' => 'English',
            'cast' => 'Bradley Cooper, Ed Helms, Zach Galifianakis',
        ]);

        Movie::create([
            'name' => 'John Wick',
            'description' => 'A retired hitman seeks vengeance.',
            'duration' => 1.41,
            'release_date' => '2014-10-24',
            'rating' => 7.4,
            'genre_id' => 1, // Action
            'language' => 'English',
            'cast' => 'Keanu Reeves, Michael Nyqvist, Alfie Allen',
        ]);

        Movie::create([
            'name' => 'Superbad',
            'description' => 'Two high school friends navigate a wild night.',
            'duration' => 1.53,
            'release_date' => '2007-08-17',
            'rating' => 7.6,
            'genre_id' => 2, // Comedy
            'language' => 'English',
            'cast' => 'Jonah Hill, Michael Cera, Christopher Mintz-Plasse',
        ]);
    }
}