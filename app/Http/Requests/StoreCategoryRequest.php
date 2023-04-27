<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'max:255'],
            'image' => ['bail', 'nullable', 'file', 'mimes:jpg,jpeg,png'],
        ];
    }
}
