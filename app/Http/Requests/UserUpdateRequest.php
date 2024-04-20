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
            'profil' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'name' => ['sometimes', 'string', 'max:20'],
            'email' => ['sometimes', 'string', 'email', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => ['sometimes', 'string', 'password', Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'status' => ['required', 'in:accepted,banned'], 
            'roles' => ['required', 'array'], 
            'roles.*' => ['exists:roles,id'],
        ];
    }
}
