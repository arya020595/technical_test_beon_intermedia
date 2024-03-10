<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'occupant_id' => 'required|exists:occupants,id',
            'house_id' => 'required|exists:houses,id',
            'dues_type_id' => 'required|exists:dues_types,id',
            'billing_start_date' => 'required|date',
            'billing_end_date' => 'required|date',
            'payment_date' => 'required|date',
            'payment_amount' => 'required|numeric',
            'payment_proof_url' => 'required|string',
            'is_paid' => 'required|boolean',
        ];
    }
}
