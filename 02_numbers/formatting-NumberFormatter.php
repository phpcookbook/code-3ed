<?php

$number = '1234.56';

// $formatted1 is 1,234.56
$usa = new \NumberFormatter("en-US", NumberFormatter::DEFAULT_STYLE);
$formatted1 = $usa->format($number);

// $formatted2 is 1 234,56
// Note that it's a "non breaking space (\u00A0) between the 1 and the 2
$france = new \NumberFormatter("fr-FR", NumberFormatter::DEFAULT_STYLE);
$formatted2 = $france->format($number);
