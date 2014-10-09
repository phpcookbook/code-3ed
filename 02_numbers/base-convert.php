<?php
// hexadecimal number (base 16)
$hex = 'a1';

// convert from base 16 to base 10
// $decimal is '161'
$decimal = base_convert($hex, 16, 10);
