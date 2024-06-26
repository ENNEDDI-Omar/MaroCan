<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MediaPlatformUpdateRequest extends FormRequest
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
            'logo' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'name' => ['sometimes', 'string', 'max:255', Rule::unique('media_platforms', 'name')->ignore($this->mediaPlatform)],
            'mediaPlatform_code' => ['sometimes', 'integer', 'digits:4', Rule::unique('media_platforms', 'media_platform_code')->ignore($this->mediaPlatform)],  
            'type' => ['sometimes', 'string', 'in:newspaper,radio,television,digital_media'],
        ];
    }
}
