<?php

namespace App\PokeDomain\PokeAPI;

use App\PokeDomain\PokeDTO\PokeDTO;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PokeAPI
{
    public $pokeAPI;

    public array $pokeTDO;
    public function __construct(public Client $client)
    {}

    /*
     *
     *
     * total de pokemons 1279
     *
     *
     * */
    public function getPokeAPI()
    {
        $this->pokeAPI = json_decode($this->client->get('https://pokeapi.co/api/v2/pokemon?limit=1279')->getBody());
        return response()->json($this->pokeAPI,Response::HTTP_OK);
    }

    /**
     * @throws GuzzleException
     */
    public function insertDTO(): array | JsonResponse
    {
        $allPoke = $this->getPokeAPI()->original;

        foreach ($allPoke->results as $poke)
        {
            $data = json_decode($this->client->get($poke->url)->getBody());
            $types = $this->getTypes($data);

            $this->pokeTDO[] = new PokeDTO(
                id: $data->id,
                name: $data->name,
                img_url: $this->getImg($data),
                attribute: $types,
                statusAPI: $poke->url);
        }

        return response()->json($this->pokeTDO,Response::HTTP_CREATED);
    }

    /**
     * @param mixed $pokemon
     * @return string
     */
    public function getTypes(mixed $pokemon):string
    {
        return match (count($pokemon->types)) {
            2 => $pokemon->types[0]->type->name . ' and ' . $pokemon->types[1]->type->name,
            1 => $pokemon->types[0]->type->name,
            0 => 'Vazio',
            default => response()->json([], Response::HTTP_NOT_FOUND),
        };
    }

    /**
     * @param mixed $data
     * @return mixed|string
     */
    public function getImg(mixed $data): mixed
    {
        if ($data->sprites->front_default == null) {
            return 'https://www.humanusjr.com.br/static/media/semImagem.6e07875b.png';
        }
        return $data->sprites->front_default;
    }

}
