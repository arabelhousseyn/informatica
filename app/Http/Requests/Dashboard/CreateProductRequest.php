<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'uuid', Rule::exists('categories', 'id')],
            'price' => ['required', 'numeric'],
            'images' => ['required', 'array'],
        ];
    }
}
