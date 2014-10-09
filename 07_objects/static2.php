<?php
class Format {
    public static function number($number, $decimals = 2, 
                                  $decimal = '.', $thousands = ',') {
        return number_format($number, $decimals, $decimal, $thousands);
    }
}

print Format::number(1234.567);
