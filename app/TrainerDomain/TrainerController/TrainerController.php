<?php

namespace App\TrainerDomain\TrainerController;

use App\Http\Controllers\Controller;
use App\PokeDomain\Requests\PokeRequest;
use App\TrainerDomain\Models\Trainer;
use App\TrainerDomain\Request\TrainerRequestValidantion;
use App\TrainerDomain\Resources\TrainerResource;
use App\TrainerDomain\TrainerDTO\TrainerDTO;
use App\TrainerDomain\TrainerService\TrainerService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function __construct(protected TrainerService $trainerService)
    {}
    public function trainer_get_pokemon($id): Response|RedirectResponse|Application|ResponseFactory
    {
        $trainerStatus = $this->trainerService->get_pokemon($id)->original;

        if (!$trainerStatus) {
            return response(['message' => 'Not found'], 404);
        }

        $trainerStatus->load('capture_pokemon');
        return response()->redirectToRoute('index')->setStatusCode(Response::HTTP_CREATED);
    }

    public function trainer_remove_pokemon($id): JsonResponse
    {
        $this->trainerService->remove_pokemon($id);

        return response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * @throws Exception
     */
    public function trainer_edit(TrainerRequestValidantion $request): RedirectResponse
    {
        $new_trainer = $this->trainerService->edit(TrainerDTO::fromRequestValidated($request));

        return response()->redirectToRoute('index',[TrainerResource::make($new_trainer)],Response::HTTP_CREATED);
    }

}
