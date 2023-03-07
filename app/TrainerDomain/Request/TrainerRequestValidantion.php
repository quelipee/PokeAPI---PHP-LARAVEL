<?php

namespace App\TrainerDomain\Request;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainerRequestValidantion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules():array
    {
        return [
            /*'id' => 'nullable',*/
            'name' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'age' => 'required|integer|max_digits:3'
        ];
    }
}
