<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class AmountCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the authenticated user
        $user = Auth::user();
        $userAmount = $user->amount;

        // Check if the request amount is greater than the user's amount
        if ($value > $userAmount) {
            $fail('You can transfer a maximum of ' . $userAmount . '.');
        }
    }
}