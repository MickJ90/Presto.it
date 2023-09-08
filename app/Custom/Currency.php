<?php

namespace App\Custom;

class Currency {

    public static function formatEuro($value)
    {
        return number_format($value, 2, ',', '.') . ' €';
    }

}