<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('index', compact('genres'));
    }

    public function indexMovie()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        $tags = Tag::all();
        return view('movies.create', compact('genres', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $movie = Movie::make($data);

        // one to many
        $genre = Genre::find($data['genre_id']);
        $movie->genre()->associate($genre);
        $movie->save();

        // many to may
        $tags = Tag::find($data['tags']);
        $movie->tags()->attach($tags); //or sync()

        return redirect()->route('index');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $tags = Tag::all();
        return view('movies.edit', compact('movie', 'genres', 'tags'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->all();

        // one to many
        $genre = Genre::find($data['genre_id']);
        $movie->genre()->associate($genre);
        $movie->update($data);

        // many to many
        $tags = Tag::find($data['tags']);
        $movie->tags()->sync($tags);

        return redirect()->route('index');
    }

    public function destroy(Movie $movie)
    {

        // detaching relation
        $movie->tags()->sync([]);

        // delete
        $movie->delete();

        return redirect()->route('index');
    }
}
