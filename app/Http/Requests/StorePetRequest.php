<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status'    => 'required|string',
            'name'      => 'required|string|max:255',
            'id'        => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'The status field is required. Select at least one of the option.',
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'id.required' => 'The id field is required.',
            'id.integer' => 'The id must be an integer.',
        ];
    }
}
