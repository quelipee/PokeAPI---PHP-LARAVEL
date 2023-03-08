<?php

namespace App\PokeDomain\PokeAPI;

use App\PokeDomain\PokeDTO\PokeStatusDTO;
use GuzzleHttp\Client;

class PokeStatusAPI
{
    public function __construct(public Client $client)
    { }

    public function getStatus($statusAPI): PokeStatusDTO
    {
        $pokeStatus = json_decode($this->client->get($statusAPI)->getBody());

        return new PokeStatusDTO(
            id: $pokeStatus->id,
            abilities: $pokeStatus-> abilities,
            base_experience: $this->baseExp($pokeStatus),
            height: $pokeStatus->height,
            name: $pokeStatus->name,
            stats: $pokeStatus->stats,
            types: $pokeStatus->types,
            weight: $pokeStatus->weight,
            img_url: $this->getImg($pokeStatus)
        );
    }
    public function getImg(mixed $pokeStatus): mixed
    {
        if ($pokeStatus->sprites->front_default == null) {
            return 'https://www.humanusjr.com.br/static/media/semImagem.6e07875b.png';
        }
        elseif ($pokeStatus->sprites->other->dream_world->front_default == null)
        {
            return $pokeStatus->sprites->front_default;
        }
        return $pokeStatus->sprites->other->dream_world->front_default;
    }

    /**
     * @param mixed $pokeStatus
     * @return int|mixed
     */
    public function baseExp(mixed $pokeStatus): mixed
    {
       if ($pokeStatus->base_experience == null)
       {
           return 0;
       }
       return $pokeStatus->base_experience;
    }
}
