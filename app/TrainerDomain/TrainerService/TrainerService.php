<?php

namespace App\TrainerDomain\TrainerService;

use App\TrainerDomain\Models\Trainer;
use App\UserDomain\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrainerService
{
    public function get_pokemon($id)
    {
        $trainer_id = $this->userGetID();
        $trainer = Trainer::find($trainer_id);
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

    public function remove_pokemon(int $id)
    {
        $trainer_id = $this->userGetID();
        $trainer = Trainer::find($trainer_id);
        $trainer->capture_pokemon()->detach($id);

        return $trainer->load('capture_pokemon');
    }

    public function userGetID()
    {
        $user = User::find(Auth::id());
        $user->load('trainer')->toArray();
        return $user->trainer->id;
    }

    public function userGetTrainer()
    {
        $userId = User::find(Auth::id());
        return Trainer::find($userId);
    }
}
