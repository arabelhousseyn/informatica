<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['bail', 'nullable', 'max:255'],
            'image' => ['bail', 'nullable', 'file', 'mimes:jpg,jpeg,png'],
        ];
    }
}
