<?php

namespace App\TrainerDomain\TrainerService;

use App\TrainerDomain\Models\Trainer;
use App\TrainerDomain\TrainerDTO\TrainerDTO;
use App\UserDomain\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrainerService
{
    public function get_pokemon($id): JsonResponse
    {
        $trainer = $this->userGetTrainer();
        $pokemons = $trainer->capture_pokemon;

        foreach ($pokemons as $pokemon)
        {
            if ($pokemon['id'] == $id)
            {
                return response()->json([], Response::HTTP_NOT_FOUND);
            }
        }

        $trainer->capture_pokemon()->attach($id,['created_at' => now(), 'updated_at' => now()]);
        return response()->json($trainer,Response::HTTP_CREATED);
    }

    public function remove_pokemon(int $id): Trainer
    {
        $trainer = $this->userGetTrainer();
        $trainer->capture_pokemon()->detach($id);

        return $trainer->load('capture_pokemon');
    }

    public function userGetTrainer():Trainer
    {
        return Trainer::find(Auth::id());
    }

    /**
     * @throws Exception
     */
    public function edit(TrainerDTO $trainerDTO): Trainer
    {
        $trainer = $this->userGetTrainer();

        if (!$trainer)
        {
            throw new Exception('Error: trainer not found');
        }
        $trainer->fill([
            'name' => $trainerDTO->name,
            'region' => $trainerDTO->region,
            'age' => $trainerDTO->age,
        ])->save();

        return $trainer;
    }
}
