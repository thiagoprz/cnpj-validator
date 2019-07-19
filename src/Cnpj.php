<?php

namespace Thiagoprz\CnpjValidator;


use Illuminate\Validation\Rule;

/**
 * Class Cnpj
 * @package Thiagoprz\CnpjValidator
 */
class Cnpj extends Rule
{
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
        // Extracting only numbers since the value can be using a mask
        $cnpj = preg_replace('/[^0-9]/', '', (string) $value);
        // Validating size
        if (strlen($cnpj) != 14)
            return false;
        // Validating first check digit
        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++)
        {
            $sum += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $rest = $sum % 11;
        if ($cnpj{12} != ($rest < 2 ? 0 : 11 - $rest))
            return false;
        // Validating second check digit
        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++)
        {
            $sum += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $rest = $sum % 11;
        return $cnpj{13} == ($rest < 2 ? 0 : 11 - $rest);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('cnpj-validator::validation.cnpj');
    }
}
