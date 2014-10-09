<?php
$number = 1234.56;

// US uses € , and . for Euro
// $formatted is €1,234.56
$usa = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
$formatted = $usa->formatCurrency($number, 'EUR');
