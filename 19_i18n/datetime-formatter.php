<?php

$when = 1376943432; // Seconds since epoch
$fmt = new IntlDateFormatter('en_US', IntlDateFormatter::FULL,
                             IntlDateFormatter::FULL);
print $fmt->format($when);
