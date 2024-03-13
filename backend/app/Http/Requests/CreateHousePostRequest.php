<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateHousePostRequest extends FormRequest
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
            'name' => 'required|string',
            'occupant_id' => 'nullable|exists:occupants,id',
            'is_inhabited' => 'required|boolean',
            'is_rented' => 'required|boolean',
            'start_date' => 'date',
            'end_date' => 'nullable|date|after:start_date'
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
