<?php
class Format {
    public static function number($number, $decimals = 2, 
                                  $decimal = '.', $thousands = ',') {
        return number_format($number, $decimals, $decimal, $thousands);
    }

    public static function integer($number) {
        return self::number($number, 0);
    }
}

print Format::number(1234.567)  . "\n";
print Format::integer(1234.567) . "\n";
