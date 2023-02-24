<?php

namespace App\PokeDomain\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img_url' => $this->img_url,
            'attribute' => $this->attribute,
            'statusAPI' => $this->statusAPI
        ];
    }
}
