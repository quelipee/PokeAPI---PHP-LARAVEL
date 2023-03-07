<?php

namespace App\PokeDomain\PokeService;

use App\PokeDomain\Models\Pokemon;
use App\PokeDomain\PokeAPI\PokeAPI;
use App\PokeDomain\PokeDTO\PokeDTO;
use App\PokeDomain\Repositories\PokeRepository\PokeRepository;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;

class PokeService
{
    public function __construct(public readonly PokeAPI $pokeAPI, public PokeRepository $repository)
    {}

    /**
     * @throws GuzzleException
     */
    public function storeAllPokemons()
    {
        $pokemons = $this->pokeAPI->insertDTO();
        foreach ($pokemons->original as $pokemon)
        {
            if($this->insertBDPokeAPI($pokemon))
            {
                Pokemon::create([
                    'id' => $pokemon->id,
                    'name' => $pokemon->name,
                    'statusAPI' => $pokemon->statusAPI,
                    'img_url' => $pokemon->img_url,
                    'attribute' => $pokemon->attribute
                ]);
            }
        }
        return response()->json([],Response::HTTP_CREATED);
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        $allPoke = $this->repository->getAllPokemon();

        $pokemonDTO = [];

        foreach ($allPoke as $pokemon)
        {
            $pokemonDTO[] = new PokeDTO(
                id: $pokemon->id,
                name: $pokemon->name,
                img_url: $pokemon->img_url,
                attribute: $pokemon->attribute,
                statusAPI: $pokemon->statusAPI);
        }
        return $pokemonDTO;
    }

    /**
     * @param mixed $data
     * @return bool
     */
    public function insertBDPokeAPI(mixed $data): bool
    {
        return Pokemon::query()->where('id', $data->id)->get()->toArray() == null;
    }
}
