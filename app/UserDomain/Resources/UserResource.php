<?php

namespace App\UserDomain\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'name' => $this->name,
            'region' => $this->region,
            'age' => $this->age
        ];
    }
}
