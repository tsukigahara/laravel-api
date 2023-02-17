<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>
    <header>
        <div class="container">
            <h1>Movies</h1>
        </div>
    </header>

    <main class="bg-light">
        <div class="container">
            <h2>Movie by genre</h4>
                <a href="{{route('movies.index')}}" type="button" class="btn btn-primary">Show all movies</a>
                <a href="{{route('movies.create')}}" type="button" class="btn btn-primary">Add movie</a>
                @foreach ($genres as $genre)
                <h2>{{$genre->name}}</h2>
                <ul>
                    @foreach ($genre ->movies as $movie)
                    <a href="">
                        <li>
                            {{ $movie->name }} - {{$movie->year}}
                        </li>
                    </a>
                    @endforeach
                </ul>
                @endforeach


        </div>
    </main>

</body>

</html>