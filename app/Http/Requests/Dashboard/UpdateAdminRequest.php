<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
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
        $admin = $this->route('admin');
        return [
            'full_name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('admins', 'id')->ignore($admin)],
            'phone' => ['required', 'max:10'],
        ];
    }
}
