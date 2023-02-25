<?php

namespace App\TrainerDomain\TrainerController;

use App\Http\Controllers\Controller;
use App\PokeDomain\Requests\PokeRequest;
use App\TrainerDomain\Request\TrainerRequestValidantion;
use App\TrainerDomain\Resources\TrainerResource;
use App\TrainerDomain\TrainerDTO\TrainerDTO;
use App\TrainerDomain\TrainerService\TrainerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function __construct(protected TrainerService $trainerService)
    {}
    public function trainer_get_pokemon($id)
    {
        $trainerStatus = $this->trainerService->get_pokemon($id)->original;

        if (!$trainerStatus) {
            return response(['message' => 'Not found'], 404);
        }

        $trainerStatus->load('capture_pokemon');
        return response()->json(TrainerResource::make($trainerStatus), Response::HTTP_CREATED);
    }

    public function trainer_remove_pokemon($id): JsonResponse
    {
        $this->trainerService->remove_pokemon($id);

        return response()->json([],Response::HTTP_NO_CONTENT);
    }

}
