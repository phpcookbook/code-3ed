<?php
$number = 1234.56;

// US uses $ , and .
// $formatted1 is $1,234.56
$usa = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
$formatted1 = $usa->format($number);

// France uses , and €
// $formatted2 is 1 234,56 €
$france = new NumberFormatter("fr-FR", NumberFormatter::CURRENCY);
$formatted2 = $france->format($number);
