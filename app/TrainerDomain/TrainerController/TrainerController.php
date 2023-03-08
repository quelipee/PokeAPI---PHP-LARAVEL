<?php

namespace App\TrainerDomain\TrainerController;

use App\Http\Controllers\Controller;
use App\PokeDomain\Models\Pokemon;
use App\PokeDomain\PokeAPI\PokeStatusAPI;
use App\TrainerDomain\Request\TrainerRequestUpdate;
use App\TrainerDomain\Request\TrainerRequestValidantion;
use App\TrainerDomain\Resources\TrainerResource;
use App\TrainerDomain\TrainerDTO\TrainerDTO;
use App\TrainerDomain\TrainerService\TrainerService;
use App\UserDomain\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function __construct(protected TrainerService $trainerService,
                                protected PokeStatusAPI $pokeStatusAPI)
    {}
    public function trainer_get_pokemon($id): Response|RedirectResponse|Application|ResponseFactory
    {
        $trainerStatus = $this->trainerService->get_pokemon($id)->original;

        if (!$trainerStatus) {
            return response(['message' => 'Not found'], 404);
        }

        $message = 'Congratulations! You caught this pokemon!!!';
        session()->flash('pokemon', $message);
        session()->put('alertShown', true);

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

        return response()->redirectToRoute('profile',[TrainerResource::make($new_trainer)],Response::HTTP_CREATED);
    }

    public function edit_view(): Response
    {
        $trainer = $this->trainerService->userGetTrainer();
        $user = User::find(Auth::id());
        return \response()->view('auth/edit',['trainer' => $trainer,'user' => $user])->setStatusCode(Response::HTTP_OK);
    }

    public function profile(): Response
    {
        $trainer = $this->trainerService->userGetTrainer();
        $user = User::find(Auth::id());
        return \response()->view('auth/profile',['trainer' => $trainer, 'user' => $user])->setStatusCode(Response::HTTP_OK);
    }

    public function show_pokemon(Pokemon $pokemon): Response | Pokemon
    {
        $pokeStatus = $this->pokeStatusAPI->getStatus($pokemon->statusAPI);
        return response()->view('auth/showPokemon',[ 'pokemon' => $pokeStatus ])->setStatusCode(Response::HTTP_CREATED);
    }
}
