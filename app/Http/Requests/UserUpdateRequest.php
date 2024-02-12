<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'alpha', 'max:20'],
            'prenom' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $this->route('user')],
            'password' => ['nullable', 'string', 'confirmed'],
            'tel' => ['nullable', 'string', 'max:20'],
        ];
    }
}
