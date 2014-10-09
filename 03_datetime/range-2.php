<?php
// Start on August 1
$start = new DateTime('August 1, 2014');
// Go 1 day at a time
$interval= new DateInterval('P1D');
// Recur 30 times more after the first occurrence.
$recurrences = 30;

$range2 = new DatePeriod($start, $interval, $recurrences);
