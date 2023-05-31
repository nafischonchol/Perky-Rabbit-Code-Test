<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            '*.productId' => 'required|numeric',
            '*.quantity' => 'required|numeric',
        ];
    }
}
