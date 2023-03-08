<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>PokeGather</title>
</head>
<body class="h-screen flex items-center justify-center">
{{--{{dd($pokemons->collection[0]->id)}}--}}

    <div class="container max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-4">
            @foreach($pokemons->collection as $pokemon)
            <div class="flex items-center justify-center flex-col">
                <img src="{{$pokemon->img_url}}" alt="">
                <div>
                    <label for="pokemon">{{$pokemon->name}}</label>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
