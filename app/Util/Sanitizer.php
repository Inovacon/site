<?php

namespace App\Util;

class Sanitizer
{
    public static function stripNonDigits(string $str)
    {
        return preg_replace('/\D/', '', $str);
    }
}
