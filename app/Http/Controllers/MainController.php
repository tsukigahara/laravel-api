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
        return view('movies.create', compact(['genres', 'tags']));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $newMovie = Movie::make($data);

        // one to many
        $genre = Genre::find($data['genre_id']);
        $newMovie->genre()->associate($genre);
        $newMovie->save();

        // many to may
        $tags = Tag::find($data['tags']);
        $newMovie->tags()->attach($tags);

        return redirect()->route('index');
    }
}
