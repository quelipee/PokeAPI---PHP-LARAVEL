<?php

namespace App\PokeDomain\PokeController;

use App\Http\Controllers\Controller;
use App\PokeDomain\Models\Pokemon;
use App\PokeDomain\PokeService\PokeService;
use App\PokeDomain\Resources\PokeResource;
use App\TrainerDomain\Models\Trainer;
use App\TrainerDomain\TrainerService\TrainerService;
use App\UserDomain\Models\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PokeController extends Controller
{
    public function __construct(public PokeService $pokeService, protected TrainerService $trainerService)
    {
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        //isRandomOrder -> embaralha os dados dentro da model
        $trainer = $this->trainerService->userGetTrainer();

        $count_pokemons = count(Pokemon::all());
        $trainer_poke_count = count($trainer->capture_pokemon);

        /* aqui ele verifica se o usuario conseguiu obter todos os pokemons, caso consiga ele vai retornar uma session com uma mensagem */
        if ($trainer_poke_count == $count_pokemons && !session()->has('alertShown')) {
            $message = 'Congratulations! You have captured all ' . $count_pokemons . ' Pokemons.';
            session()->flash('success', $message);
            session()->put('alertShown', true);
        }

        return response()->view('auth/index',['trainer' => $trainer ])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function pokemons()
    {
        $array_poke = $this->pokeService->index();
        shuffle($array_poke);
        $array_poke = array_slice($array_poke,0,24);
        $trainer = $this->trainerService->userGetTrainer();

        return response()->view('auth/pokemons',['pokemons' => PokeResource::collection($array_poke), 'trainer' => $trainer])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
