@extends('layouts.default')
@section('content')
    <!-- User Profile Page -->
    <div class="flex flex-col justify-center items-center mt-44 bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    {{strtoupper($trainer->name)}}
                </h2>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-lg font-medium text-gray-900">Nome:</p>
                        <p class="text-gray-500 mt-2">{{$trainer->name}}</p>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900">Região:</p>
                        <p class="text-gray-500 mt-2">{{$trainer->region}}</p>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900">Idade:</p>
                        <p class="text-gray-500 mt-2">{{$trainer->age}}</p>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900">E-mail:</p>
                        <p class="text-gray-500 mt-2">{{$user->email}}</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <a href="{{route('view_edit')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
