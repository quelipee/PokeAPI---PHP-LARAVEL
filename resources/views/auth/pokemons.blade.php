@extends('layouts.default')
@section('content')
    {{--    {{dd($pokemons)}}--}}
    <div>
        <div class="container mx-auto px-4 flex items-center justify-center">
            <div class="bg-gray-100 shadow-xl border rounded-md mt-20 p-10">
                <div class="grid grid-cols-8 gap-10">
                    @foreach($pokemons as $pokemon)
                        @if($pokemon->name == 'pikachu')
                            <div class="w-48 h-48 border rounded-md bg-gray-400 shadow-xl p-5">
                                <div class="flex items-center justify-center h-32">
                                    {{$pokemon->id}}
                                    <img class="w-full h-full object-contain" src="{{$pokemon->img_url}}" alt="">
                                </div>
                                <label class="text-center">
                                    <p class="text-center font-semibold text-gray-600">{{($pokemon->name)}} (OBTIDO)</p>
                                </label>
                            </div>
                        @else
                            <a href="#">
                                <div class="w-48 h-48 bg-gray-200 border rounded-md hover:bg-gray-400 shadow-xl">
                                    <div class="flex items-center justify-center h-32 p-5">
                                        <p>{{$pokemon->id}}</p>
                                        <img class="w-full h-full object-contain" src="{{$pokemon->img_url}}" alt="">
                                    </div>
                                    <label class="text-center">
                                        <p class="text-center font-semibold text-gray-600">{{$pokemon->name}}</p>
                                    </label>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>

                <div class="mt-14">
                    <div class="flex justify-center mt-8">
                        <div class="flex border">
                            <a href="" class=" bg-gray-200 hover:bg-blue-200 hover:text-gray-500 hover:font-bold text-gray-700 font-bold py-2 px-4 rounded-md shadow">
                                Random
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
