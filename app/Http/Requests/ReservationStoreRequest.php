<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            // 'user_id' => 'exists:users,id',
            'football_match_id' => 'exists:football_matches,id',
            'zone' => 'in:gradins,tribunes,vip',
            'number_of_tickets' => 'required|integer|min:1|max:5',
            //'total_price' => 'integer'
            
        ];
    }
}
