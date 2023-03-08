<?php

namespace App\TrainerDomain\Request;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequestUpdate extends FormRequest
{
    public function rules():array
    {
        return [
            'name' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'age' => 'required|integer|max_digits:3',
            'email' => 'required',
        ];
    }
}
