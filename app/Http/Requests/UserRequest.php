<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|alpha:az AZ ascii|min:3|max:64',
            'lastname' => 'required|min:3|max:64',
            'email' => 'required|unique:users,email|email:rfc|max:64',
            'reemail' => 'required|same:email',
            'password' => 'required|min:8|max:64',
            'repassword' => 'required|same:password',
            'birtdate' => 'nullable|date|before:today',
        ];
    }
}
