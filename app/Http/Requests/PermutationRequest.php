<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermutationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'odren' => ['required','string','max:60'],
            'oiep' => ['required','string','max:60'],
            'oschool' => ['required','string','max:60'],
            'sdren' => ['required','string','max:60'],
            'siep' => ['required','string','max:60'],
            'sschool' => ['required','string','max:60'],
            'phone' => ['required','string','max:60'],
            'email' => ['required','string','max:60']
        ];
    }
}
