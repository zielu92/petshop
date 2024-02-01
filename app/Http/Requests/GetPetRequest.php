<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The id is required.',
            'id.int' => 'The id must be an integer.',
        ];
    }
}
