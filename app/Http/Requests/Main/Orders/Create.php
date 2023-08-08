<?php

namespace App\Http\Requests\Main\Orders;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer' => ['required', 'string', 'min:3', 'max:50'],
            'phone' => ['required', 'string', 'min:10', 'max:20'],
            'email' => ['email:rfc,dns'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'source_id' => ['required', 'integer', 'exists:sources,id'],
            'description' => ['required', 'string', 'max:200'],
        ];
    }
}
