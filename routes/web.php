<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('get_all_pokemons',[\App\PokeDomain\PokeController\PokeController::class,'index'])->name('get_all_pokemons');
Route::post('get_pokemon/{id}',[\App\TrainerDomain\TrainerController\TrainerController::class,'trainer_get_pokemon'])->name('get_pokemon');
Route::post('remove_pokemon/{id}',[\App\TrainerDomain\TrainerController\TrainerController::class,'trainer_remove_pokemon'])->name('remove_pokemon');
