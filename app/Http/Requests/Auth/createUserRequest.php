<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'first_name'        => 'required|string',
            'middle_name'       => 'string',
            'last_name'         => 'required|string',
            'email_id'          => 'required|string',
            'phone_no'          => 'integer',
            'country_code'      => 'integer',
            'location'          => 'string',
            'username'          => 'required|string',
            'password'          => 'required|string'
        ];
    }
}
