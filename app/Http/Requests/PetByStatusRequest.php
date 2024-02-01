<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetByStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'The status field is required. Select at least one of the option.',
        ];
    }
}
