<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
{{--HEADER--}}
<div class="isolate bg-white">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
            <defs>
                <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#9089FC"></stop>
                    <stop offset="1" stop-color="#FF80B5"></stop>
                </linearGradient>
            </defs>
    </div>
    <div class="px-6 pt-6 lg:px-8">
        <nav class="flex items-center justify-between" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/index" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
{{--                    <img class="h-8" src="{{asset('img/pokeball.png')}}" alt="">--}}
                    <img class="h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/index" class="hover:text-base text-sm font-semibold leading-6 text-gray-900">Meus Pokemons</a>

                <a href="{{route('pokemons')}}" class="hover:text-base text-sm font-semibold leading-6 text-gray-900">Pokemons</a>

                <a href="#" class="hover:text-base text-sm font-semibold leading-6 text-gray-900">Marketplace</a>

                <a href="{{route('profile')}}" class="hover:text-base text-sm font-semibold leading-6 text-gray-900">Perfil</a>
            </div>

            @if(Auth::user())
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{route('logout')}}" class="hover:underline text-sm font-semibold leading-6 text-gray-900">Logout <span aria-hidden="true">&rarr;</span></a>
                </div>
            @else
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{route('login_view')}}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
            @endif

        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div role="dialog" aria-modal="true">
            <div focus="true" class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Product</a>

                            <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Features</a>

                            <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Marketplace</a>

                            <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Company</a>
                        </div>
                        <div class="py-6">
                            <a href="#" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  HEADER  --}}

{{-- CONTENT --}}
@yield('content')
{{-- CONTENT --}}

</body>
</html>
