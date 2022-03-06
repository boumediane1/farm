<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
//        return [
//            'name' => ['required', 'unique:users', 'min:3'],
//            'national_identification_number' => ['required', 'unique:users', 'min:5'],
//            'phone_number' => ['required', 'unique:users', 'regex:/^0[67][0-9]{8}$/'],
//            'role' => ['required'],
//            'username' => ['required_if:role,2'],
//            'password' => ['required_if:role,2']
//        ];

        return [
            'name' => ['required', 'unique:users'],
            'national_identification_number' => ['required', 'unique:users'],
            'phone_number' => ['required', 'unique:users'],
            'role' => ['required'],
            'username' => ['required_if:role,2'],
            'password' => ['required_if:role,2']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nom',
            'national_identification_number' => 'CIN',
            'phone_number' => 'numéro de téléphone'
        ];
    }

    public function messages()
    {
        return [
            'username.required_if' => 'Le champ nom d\'utilisateur est obligatoire.',
            'password.required_if' => 'Le champ mot de pass est obligatoire.'
        ];
    }
}
