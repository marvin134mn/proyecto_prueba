<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

// Require at least 10 characters...
(new Password)->length(10)

// Require at least one uppercase character...
(new Password)->requireUppercase()

// Require at least one numeric character...
(new Password)->requireNumeric()

// Require at least one special character...
(new Password)->requireSpecialCharacter()

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
    }
}
