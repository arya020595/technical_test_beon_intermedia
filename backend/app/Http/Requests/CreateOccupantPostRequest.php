<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateOccupantPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'image_ktp_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'occupant_status' => 'required|string|in:contract,permanent',
            'phone_number' => 'required|string|unique:occupants,phone_number',
            'is_married' => 'required|boolean',
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
