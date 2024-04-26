<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VolunteeringOfferUpdateRequest extends FormRequest
{
    /**
     * Déterminez si l'utilisateur est autorisé à faire cette demande.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtenez les règles de validation qui s'appliquent à la demande.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $volunteeringOfferId = $this->route('volunteering_offer');

        return [
            'affiche' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'title' => ['required', 'string', Rule::unique('volunteering_offers', 'title')->ignore($volunteeringOfferId)],
            'description' => 'sometimes|string|max:65535',
            'position' => 'required|string',
            'status' => 'required|string|in:available,not available',
            'number_of_volunteers' => 'required|integer|min:1|max:100',
            'football_match_id' => 'exists:football_matches,id',
        ];
    }
}
