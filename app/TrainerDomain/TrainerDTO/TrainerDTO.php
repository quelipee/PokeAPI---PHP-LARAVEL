<?php

namespace App\TrainerDomain\TrainerDTO;

use App\TrainerDomain\Request\TrainerRequestValidantion as TrainerRequest;

class TrainerDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $region,
        public readonly int $age,
    )
    {}

    public static function fromRequestValidated(TrainerRequest $request): TrainerDTO
    {
        return new self(
            id: $request->validated('id'),
            name: $request->validated('name'),
            region: $request->validated('region'),
            age: $request->validated('age'),
        );
    }
}
