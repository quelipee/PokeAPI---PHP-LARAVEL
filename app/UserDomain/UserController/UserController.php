<?php

namespace App\UserDomain\UserController;

use App\Http\Controllers\Controller;
use App\UserDomain\Requests\UserLoginRequest;
use App\UserDomain\Requests\UserRequest;
use App\UserDomain\Resources\UserResource;
use App\UserDomain\UserDTO\UserDTO;
use App\UserDomain\UserService\UserService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(public UserService $userService)
    {
    }

    public function register(UserRequest $request): JsonResponse|RedirectResponse
    {
        $trainer = $this->userService->store(
            UserDTO::fromRequestValidated($request)
        );

        if ($trainer)
        {
            $this->userService->authenticate(
                UserDTO::fromRequestValidated($request)
            );
            return response()->redirectTo(route('index',[UserResource::make($trainer)]),Response::HTTP_CREATED);//TODO
        }
        return response()->json($trainer, Response::HTTP_NOT_FOUND);
    }

    public function login(UserLoginRequest $request): Redirector|Application|RedirectResponse
    {
        $this->userService->authenticate(
            UserDTO::fromRequestLoginValidated($request)
        );

        return redirect(route('index'))->setStatusCode(Response::HTTP_CREATED);
    }
    public function logout(): JsonResponse|Redirector|RedirectResponse|Application
    {
        $this->userService->destroySession();
        if (!Auth::user())
        {
            return redirect(route('PokeAPI'),Response::HTTP_FOUND);
        }
        try {
            throw new Exception('Error');
        }catch (Exception $e)
        {
            return response()->json($e->getMessage(),Response::HTTP_NOT_FOUND);
        }
    }

}
