<?php

$obj = new DateTime('2013-08-20T12:34:56');
print IntlDateFormatter::formatObject($obj, 'eeee dd MMMM y', 'es_ES') . "\n";
print IntlDateFormatter::formatObject($obj, IntlDateFormatter::FULL, 'fr_FR') . "\n";
// First element is date format, second is time format
$formats = array(IntlDateFormatter::FULL, IntlDateFormatter::SHORT);
print IntlDateFormatter::formatObject($obj, $formats, 'de_DE') . "\n";
