<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteeringOfferStoreRequest extends FormRequest
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
            'affiche' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048
            'title' => 'required|string|unique:volunteering_offers,title',
            'description' => 'required|string|max:65535',
            'position' => 'required|string',
            'status' => 'required|string|in:available,not available',
            'number_of_volunteers' => 'required|integer|min:1|max:100',
            'football_match_id' => 'exists:football_matches,id',
        ];
    }
}
