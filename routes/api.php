<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getPoke',[\App\PokeDomain\PokeAPI\PokeAPI::class,'getPokeAPI'])->name('getPoke');
Route::get('insertPokeAPIDTO',[\App\PokeDomain\PokeAPI\PokeAPI::class,'insertDTO'])->name('insertPokeAPI');
Route::get('get_all_pokemons',[\App\PokeDomain\PokeController\PokeController::class,'index'])->name('get_all_pokemons');

Route::get('insertBD',[\App\PokeDomain\PokeService\PokeService::class,'storeAllPokemons'])->name('getAllPokemonsw');
Route::post('create_trainer',[\App\TrainerDomain\TrainerController\TrainerController::class,'store_trainer'])->name('create_trainer');

Route::post('profile_update',[\App\TrainerDomain\TrainerController\TrainerController::class,'trainer_edit'])->name('profile_update');
