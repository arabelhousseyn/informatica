<?php

namespace App\Http\Requests;

use App\States\Order\OrderState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['bail', 'required', Rule::in(OrderState::all())],
        ];
    }
}
