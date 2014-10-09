<?php
$income = 5549.3;
$debit = -25.95;

$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
print $fmt->formatCurrency($income, 'USD') . ' in and ' .
   $fmt->formatCurrency($debit, 'EUR') . ' out';
