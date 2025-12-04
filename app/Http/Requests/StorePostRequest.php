<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'subject.required' => 'O assunto é obrigatório.',
            'content.required' => 'O conteúdo é obrigatório.',
            'category_id.required' => 'A categoria é obrigatória.',
            'category_id.exists' => 'A categoria selecionada não existe.',
            'author_id.required' => 'O autor é obrigatório.',
            'author_id.exists' => 'O autor selecionado não existe.',
            'status_id.required' => 'O status é obrigatório.',
            'status_id.exists' => 'O status selecionado não existe.',
            'tags.*.exists' => 'Uma ou mais tags selecionadas não existem.',
        ];
    }
}