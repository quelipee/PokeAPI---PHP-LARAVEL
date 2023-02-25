<?php

namespace App\UserDomain\UserDTO;

use App\UserDomain\Requests\UserLoginRequest;
use App\UserDomain\Requests\UserRequest;

class UserDTO
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $region,
        public readonly ?int $age,
        public readonly string $email,
        public readonly string $password,
    )
    {
    }

    public static function fromRequestValidated(UserRequest $request) : UserDTO
    {
        return new self(
            name: $request->validated('name'),
            region: $request->validated('region'),
            age: $request->validated('age'),
            email: $request->validated('email'),
            password: $request->validated('password')
        );
    }
    public static function fromRequestLoginValidated(UserLoginRequest $request) : UserDTO
    {
        return new self(
            name: $request->validated('name'),
            region: $request->validated('region'),
            age: $request->validated('age'),
            email: $request->validated('email'),
            password: $request->validated('password')
        );
    }

}
