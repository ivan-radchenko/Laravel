<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Edit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:5', 'max:150'],
            'image' => ['nullable', 'image'],
            'description' => ['nullable', 'string', 'max:200'],
            'author' => ['required', 'string', 'min:3', 'max:50'],
            'source_id' => ['required', 'integer', 'exists:sources,id'],
            'status' => ['required', new Enum(Status::class)],
        ];
    }
}
