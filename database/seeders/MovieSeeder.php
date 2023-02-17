<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::factory()->count(50)->make()->each(function ($movie) {

            // add relationship with genre one to many
            $genre = Genre::inRandomOrder()->first();
            $movie->genre()->associate($genre);
            $movie->save();

            // add relationship between movie_id and tag_id in intermediate table (many to many)
            $tags = Tag::inRandomOrder()->limit(rand(1, 5))->get();
            $movie->tags()->attach($tags);
        });
    }
}
