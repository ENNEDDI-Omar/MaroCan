<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'title' => ['sometimes', 'max:255', 'string', 'unique:articles,title,' . $this->article->id],
            'content' => ['sometimes', 'max:65535', 'string'],
            'status' => ['sometimes', 'in:draft,published,pending'],
            'published_at' => ['nullable', 'date', 'date_format:Y-m-d'],
            'journalist_id' => ['sometimes', 'required', 'exists:journalists,id'],
            'tags' => ['sometimes', 'array'],
            'tags.*' => ['exists:tags,id']
        ];
    }
}
