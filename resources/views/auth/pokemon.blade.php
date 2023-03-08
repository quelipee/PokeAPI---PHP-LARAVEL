@extends('layouts.default')
@section('title','captura')
@section('content')
    <div>
            <div class="max-w-md mx-auto mt-44">
                <div class="rounded-md shadow-md overflow-hidden">
                    <div class="flex justify-center p-5">
                        <img src="{{$pokemon->img_url}}" class="w-32 h-32">
                    </div>
                    <div class="p-5">
                        <form action="{{route('get_pokemon', $pokemon->id)}}" method="POST">
                            @csrf
                            @method('post')
                            <div class="mb-4">
                                <label for="answer" class="block text-gray-700 font-bold mb-2">Qual o nome deste Pokemon?</label>
                                <input id="answer" name="name" type="text" autocomplete="off" required class="appearance-none rounded-none
                                relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md
                                focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Resposta" required>
                                @error('pokemon_name')
                                <p class="text-sm text-gray-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-center">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Capturar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

    </div>
@endsection
