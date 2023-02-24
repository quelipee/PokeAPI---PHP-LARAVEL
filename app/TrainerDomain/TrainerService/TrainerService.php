<?php

namespace App\TrainerDomain\TrainerService;

use App\TrainerDomain\Models\Trainer;
use App\TrainerDomain\TrainerDTO\TrainerDTO;
use Illuminate\Http\Response;

class TrainerService
{
    public function create_trainer(TrainerDTO $trainerDTO)
    {
        return Trainer::create([
            'name' => $trainerDTO->name,
            'region' => $trainerDTO->region,
            'age' => $trainerDTO->age,
        ]);
    }

    public function get_pokemon(TrainerDTO $trainerDTO, $id)
    {
        $trainer = Trainer::find($trainerDTO->id);
        $pokemons = $trainer->capture_pokemon;

        foreach ($pokemons as $pokemon)
        {
            if ($pokemon['id'] == $id)
            {
                return response()->json([], Response::HTTP_NOT_FOUND);
            }
        }

        $trainer->capture_pokemon()->attach($id);
        return response()->json($trainer,Response::HTTP_CREATED);
    }

    public function remove_pokemon(TrainerDTO $trainerDTO, int $id)
    {
        $trainer = Trainer::find($trainerDTO->id);
        $trainer->capture_pokemon()->detach($id);

        return $trainer->load('capture_pokemon');
    }
}
