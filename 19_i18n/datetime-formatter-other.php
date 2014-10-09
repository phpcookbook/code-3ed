<?php

$fmt = new IntlDateFormatter('en_US', IntlDateFormatter::FULL,
                             IntlDateFormatter::FULL,
                             'America/Chicago');

$obj = new DateTime('2013-08-20T12:34:56Z');
$parts = array('tm_sec' => 56,
               'tm_min' => 34,
               'tm_hour' => 12,
               'tm_mday' => 20,
               'tm_mon' => 7, /* 0 = January */
               'tm_year' => 113); /* 0 = 1900 */

print $fmt->format($obj) . "\n";
print $fmt->format($parts) . "\n";
