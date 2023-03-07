<?php

namespace App\PokeDomain\Repositories\PokeRepository;

use App\PokeDomain\Models\Pokemon;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class PokeRepository
{
    /**
     * @throws Exception
     */
    public function getAllPokemon(): Collection
    {
        $pokemons = Pokemon::all();
        if (!$pokemons)
        {
            throw new Exception('pokemons not found!!!');
        }
        return $pokemons;
    }
}
