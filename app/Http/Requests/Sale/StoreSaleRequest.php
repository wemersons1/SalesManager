<?php

namespace App\Http\Requests\Sale;

use App\Http\Requests\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    use FailedValidationTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'products' => 'required|array',
            'products.*.product_id' => 'required|numeric|exists:products,product_id',
            'products.*.amount' => 'required|numeric|min:1|max:10000'
        ];
    }
}
