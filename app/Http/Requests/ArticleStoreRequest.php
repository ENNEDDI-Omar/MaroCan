<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'title' => ['required', 'string','max:255', 'unique:articles, title'],
            'content' => ['required', 'string', 'max:65535'],
            'status' => ['required', 'in:draft,published,pending'],
            'published_at' => ['nullable', 'date', 'date_format:Y-m-d'],
            'journalist_id' => ['required', 'exists:journalists, id'],
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ];
    }
}