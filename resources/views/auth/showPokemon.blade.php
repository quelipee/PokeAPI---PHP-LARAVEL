@extends('layouts.default')
@section('title',strtoupper($pokemon->name))
@section('content')
{{--    {{dd($pokemon)}}--}}
    <!-- Pokemon Profile Page -->
    <div class="flex flex-col justify-center items-center min-h-full mt-20 bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    {{strtoupper($pokemon->name)}}
                </h2>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-center">
                    <img src="{{$pokemon->img_url}}" alt="Pikachu" class="w-48 h-48">
                </div>
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div>
                        <p class="text-lg font-medium text-gray-900">Tipo:</p>
                        @foreach($pokemon->types as $type)
                            <p class="text-gray-500 mt-2">{{$type->type->name}}</p>
                        @endforeach
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900">Altura:</p>
                        <p class="text-gray-500 mt-2">{{$pokemon->height}} m</p>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900">Peso:</p>
                        <p class="text-gray-500 mt-2">{{$pokemon->weight}} kg</p>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900">Abilidades:</p>
                        @foreach($pokemon->abilities as $ability)
                            <p class="text-gray-500 mt-2">{{$ability->ability->name}}</p>
                        @endforeach
                    </div>
                    <div class="col-span-2 text-center">
                        <p class="text-lg font-medium text-gray-900">Experiencia Base:</p>
                        <p class="text-gray-500 mt-2">{{$pokemon->base_experience}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
