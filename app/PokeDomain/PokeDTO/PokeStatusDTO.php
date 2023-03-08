<?php

namespace App\PokeDomain\PokeDTO;

class PokeStatusDTO
{
    public function __construct(
        public readonly int $id,
        public readonly array $abilities,
        public readonly ?int $base_experience,
        public readonly int $height,
        public readonly string $name,
        public readonly array $stats,
        public readonly array $types,
        public readonly int $weight,
        public readonly string $img_url,
    )
    {}
}
