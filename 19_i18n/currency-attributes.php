<?php

$amounts = array( array(152.9, 'USD'),
                  array(328, 'ISK'),
                  array(-1, 'USD'),
                  array(500.53, 'EUR') );

$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
$fmt->setAttribute(NumberFormatter::PADDING_POSITION, NumberFormatter::PAD_AFTER_PREFIX);
$fmt->setAttribute(NumberFormatter::FORMAT_WIDTH, 15);
$fmt->setTextAttribute(NumberFormatter::PADDING_CHARACTER, ' ');

foreach ($amounts as $amount) {
    print $fmt->formatCurrency($amount[0], $amount[1]) . "\n";
}
