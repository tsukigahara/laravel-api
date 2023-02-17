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
            <h2>All movies</h4>
                <a href="{{route('index')}}" type="button" class="btn btn-primary">Go back</a>
                <a href="{{route('movies.create')}}" type="button" class="btn btn-primary">Add movie</a>
                <ul>
                    @foreach ($movies as $movie)
                    <a href="">
                        <li>
                            {{ $movie->name }} - {{$movie->year}} - CASHOUT: {{$movie->cashOut}} - TAGS:
                            @foreach ($movie->tags as $tag)
                            - {{$tag->name}}
                            @endforeach
                        </li>
                    </a>
                    @endforeach
                </ul>
        </div>
    </main>

</body>

</html>