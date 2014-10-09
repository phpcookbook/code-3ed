<?php

$year = 2016;
$when = new DateTime("November 1, $year");
if ($when->format('D') != 'Mon') {
    $when->modify("next Monday");
}
$when->modify("next Tuesday");

print "In $year, US election day is on the " .
    $when->format('jS') . ' day of November.';
