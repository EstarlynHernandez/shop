<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'country' => 'required|string|min:3|max:64',
            'state' => 'required|string|min:3|max:64',
            'address' => 'required|string|min:3|max:64',
            'postal' => 'required|numeric|min:1000|max:999999999'
        ];
    }
}
