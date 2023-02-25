<?php

namespace App\UserDomain\UserController;

use App\Http\Controllers\Controller;
use App\UserDomain\Requests\UserLoginRequest;
use App\UserDomain\Requests\UserRequest;
use App\UserDomain\Resources\UserResource;
use App\UserDomain\UserDTO\UserDTO;
use App\UserDomain\UserDTO\UserLoginDTO;
use App\UserDomain\UserService\UserService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(public UserService $userService)
    {
    }

    public function register(UserRequest $request)
    {
        $trainer = $this->userService->store(
            UserDTO::fromRequestValidated($request)
        );

        if ($trainer)
        {
            $this->userService->authenticate(
                UserDTO::fromRequestValidated($request)
            );
            return \response()->redirectTo(route('',[UserResource::make($trainer)]),Response::HTTP_CREATED);//TODO
        }
        return response()->json($trainer, Response::HTTP_NOT_FOUND);
    }

    public function login(UserLoginRequest $request)
    {
        $this->userService->authenticate(
            UserDTO::fromRequestLoginValidated($request)
        );

        return response()->json(redirect(route('login')),Response::HTTP_CREATED);
    }
    public function logout()
    {
        $this->userService->destroySession();
        if (!Auth::user())
        {
            //TODO adjusts more latter
            return response()->json([],Response::HTTP_OK);
        }
        try {
            throw new Exception('Error');
        }catch (Exception $e)
        {
            return response()->json($e->getMessage(),Response::HTTP_NOT_FOUND);
        }
    }

}
