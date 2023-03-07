@extends('layouts.default')
@section('content')
    <div>
        <form action="{{route('get_pokemon', $pokemon->id)}}" method="post">
            @csrf
            @method('post')
        <div class="container mx-auto px-4 max-w-5xl flex items-center justify-center">

                <div class="mt-36 grid grid-rows-4 flex items-center justify-center shadow-xl bg-gray-200 w-1/2 p-10 rounded border border-xl">
                    <div class="bg-gray-300 rounded border border-xl shadow-xl">
                        <img src="{{$pokemon->img_url}}" alt="">
                    </div>

                    <div class="text-center bg-gray-300 shadow-xl border border-xl rounded">
                        <h2 class="font-bold text-gray-600">NOME</h2>
                        <h3>{{$pokemon->name}}</h3>
                    </div>

                    <div class="text-center bg-gray-300 shadow-xl border border-xl rounded">
                        <h2 class="font-bold text-gray-600">TIPO</h2>
                        <h3>{{$pokemon->attribute}}</h3>
                    </div>

                    <div>
                        <button type="submit" class="hover:bg-blue-400 bg-blue-500 rounded border shadow-xl border-md text-white px-5 py-1 font-semibold"
                        >Capturar</button>
                    </div>
                </div>

        </div>
        </form>
    </div>
@endsection
