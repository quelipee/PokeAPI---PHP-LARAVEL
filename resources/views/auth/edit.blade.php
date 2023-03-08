@extends('layouts.default')
@section('title','Editar Perfil')
@section('content')
    <!-- Edit User Page -->
    <div class="flex flex-col justify-center items-center min-h-full mt-44 bg-gray-100 py-12 px-4 sm:px-6 lg:px-8 mt-20 ">
        <div class="space-y-8 w-1/2 rounded border border-xl shadow-xl p-5">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Perfil {{$trainer->name}}
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{route('profile_update')}}" method="POST">
                @csrf
                @method('post')
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name" value="{{$trainer->name}}">
                    </div>
                    @error('name')
                    <div>
                        <p>
                            {{$message}}
                        </p>
                    </div>
                    @enderror

                    <div>
                        <label for="region" class="sr-only">Região</label>
                        <input id="region" name="region" type="text" autocomplete="region" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Region" value="{{$trainer->region}}">
                    </div>
                    @error('region')
                    <div>
                        <p>
                            {{$message}}
                        </p>
                    </div>
                    @enderror

                    <div>
                        <label for="age" class="sr-only">Idade</label>
                        <input id="age" name="age" type="text" autocomplete="age" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Age" value="{{$trainer->age}}">
                    </div>
                    @error('age')
                    <div>
                        <p>
                            {{$message}}
                        </p>
                    </div>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-10">
                    <div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                    <div>
                        <a href="{{route('profile')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
