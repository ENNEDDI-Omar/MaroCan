<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaPlatformStoreRequest extends FormRequest
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
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'], 
            'name' => ['required', 'string', 'max:255', 'unique:media_platforms,name'],
            'mediaPlatform_code' => ['required', 'integer', 'digits:4', 'unique:media_platforms,mediaPlatform_code'],
            'type' => ['required', 'string', 'in:newspaper,radio,television,digital_media']
        ];
    }
}
