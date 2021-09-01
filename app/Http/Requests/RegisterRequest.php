<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'nom' => ['required','string','max:60'],
            'prenoms' => ['required','string','max:60'],
            'contact' => ['required','string','max:60','regex:/^[0-9]{10}/','unique:users,contact'],
            'email' => ['required','string','email','max:100','unique:users'],
            'matricule' => ['required','Regex:/^[0-9]{6}[A-Z]{1}/','unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
