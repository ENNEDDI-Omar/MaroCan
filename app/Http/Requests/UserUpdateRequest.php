<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
            'profil' => ['sometimes', 'string', 'max:255', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'name' => ['sometimes', 'alpha', 'max:20'],
            'email' => ['sometimes', 'string', 'email', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => ['sometimes', 'string', 'confirmed', Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'roles' => ['sometimes', 'array'],
        ];
    }
}
