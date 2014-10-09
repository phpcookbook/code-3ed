<?php
$number = 1234.56;

// $formatted1 is "1,235" - 1234.56 gets rounded up and , is
// the thousands separator");
$formatted1 = number_format($number);

// Second argument specifies number of decimal places to use.
// $formatted2 is 1,234.56
$formatted2 = number_format($number, 2);

// Third argument specifies decimal point character
// Fourth argument specifies thousands separator
// $formatted3 is 1.234,56
$formatted3 = number_format($number, 2, ",", ".");
