<?php

namespace App\PokeDomain\PokeDTO;

use App\PokeDomain\Requests\PokeRequest;

class PokeDTO
{
    public function __construct(
                                public readonly int $id,
                                public readonly string $name,
                                public readonly string $img_url,
                                public readonly string $attribute,
                                public readonly string $statusAPI)
    {}
}
