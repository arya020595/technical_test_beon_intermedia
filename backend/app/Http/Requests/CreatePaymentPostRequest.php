<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreatePaymentPostRequest extends FormRequest
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
            'occupant_id' => 'required|exists:occupants,id',
            'house_id' => 'required|exists:houses,id',
            'dues_type_id' => 'required|exists:dues_types,id',
            'billing_start_date' => 'required|date',
            'billing_end_date' => 'required|date|after_or_equal:billing_start_date',
            'payment_date' => 'required|date',
            'payment_amount' => 'required|numeric',
            'payment_proof_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_paid' => 'required|boolean',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'error'   => 'Validation errors',
            'messages'      => $validator->errors()
        ], 400));
    }
}
