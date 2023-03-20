@extends('layouts.default')
@section('title','Home')
@if(session()->has('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif

@if(session()->has('pokemon'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p>{{ session()->get('pokemon') }}</p>
    </div>
@endif
@section('content')
    <div>
        <div class="container mx-auto px-4 ">
            <div class="bg-gray-100 shadow-xl border rounded-md mt-20 p-10">

                <div class="grid grid-cols-8 gap-10">
                    @foreach($trainer->capture_pokemon as $trainer_poke)
                        <a href="{{route('show_pokemon',$trainer_poke->id)}}">
                            <div class="w-44 h-52 border rounded-md bg-blue-300 shadow-xl p-5 hover:bg-blue-400">
                                <div class="flex items-center justify-center h-32">
                                    <p class="text-gray-600">{{$trainer_poke->id}}</p>
                                    <img class="w-full h-full object-contain" src="{{$trainer_poke->img_url}}" alt="">
                                </div>
                                <label class="text-center">
                                    <p class="text-center font-semibold text-white">{{str_replace('-', ' ', $trainer_poke->name)}}</p>
                                </label>
                            </div>
                        </a>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection
{{--este if mostra os erros para que o usuario nao possa capturar o mesmo pokemon ou ver o perfil de um pokemon que ele nao obteve --}}
@if ($errors->any())
    <script>
        alert("{{ $errors->first('error') }}");
    </script>
@endif
