<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAmountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:100'],
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'The transaction amount is required.',
            'amount.numeric' => 'The transaction amount must be a numeric value.',
            'amount.min' => 'The transaction amount must be at least 100.',
        ];
    }
}