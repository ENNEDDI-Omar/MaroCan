<?php

namespace App\Http\Requests;

use App\Rules\ValidCodeForMedia;
use Illuminate\Foundation\Http\FormRequest;

class AccreditationBadgeStoreRequest extends FormRequest
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
            'user_id' => ['exists:users,id'],
            'mediaPlatform_id' => ['exists:media_platforms,id'],
            'license_number' => ['required','string', 'unique:accreditation_badges,license_number'],
            'media_platform_code' => ['required', 'string', new ValidCodeForMedia()],
        ];
    }
}
