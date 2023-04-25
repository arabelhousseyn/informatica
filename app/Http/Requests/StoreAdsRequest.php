<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'max:255'],
            'description' => ['bail', 'required'],
            'image' => ['bail', 'required', 'file', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}
