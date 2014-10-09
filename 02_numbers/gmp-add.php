<?php
$sum = gmp_add('1234567812345678', '8765432187654321');
// $sum is now a GMP resource, not a string; use gmp_strval() to convert
print gmp_strval($sum); // prints 9999999999999999
