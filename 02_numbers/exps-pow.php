<?php
// $exp (2^e) is about 6.58
$exp = pow( 2, M_E);
// $pow1 (2^10) is 1024
$pow1 = pow( 2, 10);
// $pow2 (2^-2) is 0.25
$pow2 = pow( 2, -2);
// $pow3 (2^2.5 is about 5.656
$pow3 = pow( 2, 2.5);
// $pow4 ( (-2)^10 ) is 1024
$pow4 = pow(-2, 10);
// is_nan($pow5) returns true, because
// fractional exponent of negative 2 is not a real number.
$pow5 = pow(-2, -2.5);
