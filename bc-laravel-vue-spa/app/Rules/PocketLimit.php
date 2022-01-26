<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PocketLimit implements Rule
{
    private const POCKET_LIMIT = 200000;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return array_sum($value) <= self::POCKET_LIMIT;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The sum of the monthly values can\'t be more than the pocket\'s limit.';
    }
}
