<?php

namespace App\UserDomain\UserService;

use App\TrainerDomain\Models\Trainer;
use App\UserDomain\Models\User;
use App\UserDomain\UserDTO\UserDTO;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class UserService
{
    public function store(UserDTO $userDTO)
    {
        $users = User::all();
        foreach ($users as $user)
        {
            if ($user->email == $userDTO->email)
            {
                return response()->json(['message' => 'Error!! Email ja cadastrado'], Response::HTTP_UNAUTHORIZED);
            }
        }

        $user = User::create([
            'email' => $userDTO->email,
            'password' => $userDTO->password
        ]);

        return Trainer::create([
            'name' => $userDTO->name,
            'region' => $userDTO->region,
            'age' => $userDTO->age,
            'user_id' => $user->id
        ]);
    }
    public function authenticate(UserDTO $userDTO)
    {
        $credentials = [
            'email' => $userDTO->email,
            'password' => $userDTO->password
        ];

        if (!Auth::attempt($credentials))
        {
            throw new Exception('Error');
        }
        session()->start();
        session()->put('id',Auth::id());

        return response()->json([],Response::HTTP_CREATED);
    }

    public function destroySession()
    {
        Auth::logout();
        return response()->json([],Response::HTTP_CREATED);
    }
}
