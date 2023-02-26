<?php

use App\PokeDomain\PokeController\PokeController;
use App\TrainerDomain\TrainerController\TrainerController;
use App\UserDomain\UserController\UserController;
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
    return view('PokeAPI');
})->name('PokeAPI');

Route::middleware(['guest'])->group(function ()
{
    Route::get('login',function ()
    {
        return view('guest/login');
    })->name('login_view');

    Route::get('register',function ()
    {
        return view('guest/register');
    })->name('register_view');

})->name('guest_view');

Route::middleware(['guest'])->group(function ()
{
    Route::post('login',[UserController::class,'login'])->name('login');
    Route::post('register',[UserController::class,'register'])->name('register');

})->name('guest');

Route::middleware(['auth'])->group(function ()
{
    Route::get('index',[PokeController::class,'index'])->name('index');

    Route::post('get_pokemon/{id}',[TrainerController::class,'trainer_get_pokemon'])->name('get_pokemon');
    Route::post('remove_pokemon/{id}',[TrainerController::class,'trainer_remove_pokemon'])->name('remove_pokemon');
    Route::get('logout',[UserController::class,'logout'])->name('logout');
});

Route::get('pokemons',[PokeController::class,'pokemons'])->name('pokemons');

