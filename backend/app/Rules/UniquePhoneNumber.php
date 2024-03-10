<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Occupant;

class UniquePhoneNumber implements ValidationRule
{
    protected $currentPhoneNumber;
    protected $occupantId;

    public function __construct($currentPhoneNumber, $occupantId)
    {
        $this->currentPhoneNumber = $currentPhoneNumber;
        $this->occupantId = $occupantId;
    }

    public function validate(string $attribute, $value, Closure $fail): void
    {
        // Skip validation if the value is the same as the current phone number
        if ($value === $this->currentPhoneNumber) {
            return;
        }

        $isUnique = Occupant::where('phone_number', $value)->where('id', '!=', $this->occupantId)->exists();

        if ($isUnique) {
            $fail("The $attribute has already been taken by another occupant.");
        }
    }
}
