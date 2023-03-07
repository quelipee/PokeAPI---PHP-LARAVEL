@extends('layouts.default')
@section('content')
{{--    {{dd($pokemons)}}--}}
    <div>
        <div class="container mx-auto px-4 ">
            <div class="bg-gray-100 shadow-xl border rounded-md mt-20 p-10">

                <div class="grid grid-cols-8 gap-10">
                    @foreach($pokemons as $pokemon)
                        @foreach($trainer->capture_pokemon as $trainerPoke)
                            @if($pokemon->name == $trainerPoke->name)
                                <div class="w-44 h-48 border rounded-md bg-blue-300 shadow-xl p-5">
                                    <div class="flex items-center justify-center h-32">
                                        <p class="text-gray-600">{{$pokemon->id}}</p>
                                        <img class="w-full h-full object-contain" src="{{$pokemon->img_url}}" alt="">
                                    </div>
                                    <label class="text-center">
                                        <p class="text-center font-semibold text-white">{{$pokemon->name}}</p>
                                    </label>
                                </div>

                            @endif
                        @endforeach
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
