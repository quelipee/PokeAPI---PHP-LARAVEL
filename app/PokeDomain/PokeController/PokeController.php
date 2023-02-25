<?php

namespace App\PokeDomain\PokeController;

use App\Http\Controllers\Controller;
use App\PokeDomain\PokeService\PokeService;
use App\PokeDomain\Resources\PokeResource;
use Illuminate\Http\Response;

class PokeController extends Controller
{
    public function __construct(public PokeService $pokeService)
    {
    }

    public function index()
    {
        $array_poke = $this->pokeService->index();

        return response()->view('auth/index',['pokemons' => PokeResource::collection($array_poke)])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
