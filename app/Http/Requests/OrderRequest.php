<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
        $json = file_get_contents(base_path('app').'/Support/json/algerian_cities.json');
        $algerianCities = json_decode($json, true);

        return [
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'phone' => ['required', 'digits:10'],
            'email' => ['nullable', 'email:rfc,dns,filter'],
            'address1' => ['required'],
            'address2' => ['nullable'],
            'city' => ['required', 'max:255'],
        ];
    }
}
