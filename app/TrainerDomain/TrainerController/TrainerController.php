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

class TrainerController extends Controller
{
    public function __construct(protected TrainerService $trainerService)
    {}
    public function store_trainer(TrainerRequestValidantion $request)
    {
        $trainer = $this->trainerService->create_trainer(
            TrainerDTO::fromRequestValidated($request)
        );

        return TrainerResource::make($trainer);
    }

    public function trainer_get_pokemon(TrainerRequestValidantion $request, $id)
    {
        $trainerStatus = $this->trainerService->get_pokemon(
            TrainerDTO::fromRequestValidated($request),$id
        )->original;

        if (!$trainerStatus) {
            return response(['message' => 'Not found'], 404);
        }

        $trainerStatus->load('capture_pokemon');
        return response()->json(TrainerResource::make($trainerStatus)->toArray($request), Response::HTTP_CREATED);
    }

    public function trainer_remove_pokemon(TrainerRequestValidantion $request, $id): JsonResponse
    {
        $this->trainerService->remove_pokemon(
            TrainerDTO::fromRequestValidated($request),$id
        );

        return response()->json([],Response::HTTP_NO_CONTENT);
    }

}
