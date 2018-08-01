<?php

namespace App\Validators;

class CnpjValidator
{
    /**
     * @param string $attribute
     * @param string|null $value
     * @return bool
     */
    public function validate($attribute, $value = null)
    {
        if (null === $value) {
            $value = $attribute;
        }

        if (! is_scalar($value)) {
            return false;
        }

        $cleanInput = preg_replace('/\D/', '', $value);
        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        if ($cleanInput < 1) {
            return false;
        }

        if (mb_strlen($cleanInput) != 14) {
            return false;
        }

        for ($i = 0, $n = 0; $i < 12; $n += $cleanInput[$i] * $b[++$i]);

        if ($cleanInput[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($i = 0, $n = 0; $i <= 12; $n += $cleanInput[$i] * $b[$i++]);

        if ($cleanInput[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }
}
