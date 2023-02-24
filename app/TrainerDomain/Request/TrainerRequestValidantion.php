<?php

namespace App\TrainerDomain\Request;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules():array
    {
        return [
            'id' => 'nullable',
                /*'unique:App\TrainerDomain\Models\Trainer,id|integer',*/
            'name' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'age' => 'required|integer|max_digits:3'
        ];
    }
}
