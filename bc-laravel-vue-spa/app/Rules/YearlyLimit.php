<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YearlyLimit implements Rule
{
    private const YEARLY_LIMIT = 400000;

    private $monthlyPacketValue = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->monthlyPacketValue = collect($request->all())->pluck('months');
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
        $givenYearlyAmount = $this->monthlyPacketValue->reduce(function($carry, $item){
            return $carry + array_sum($item);
        });

        return $givenYearlyAmount <= self::YEARLY_LIMIT;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The sum of the aggregated pocket values can\'t be more than the yearly limit.';
    }
}
