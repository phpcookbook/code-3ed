<?php
// Start on August 1
$start = new DateTime('August 1, 2014');
// End date is exclusive, so this will stop on August 31
$end = new DateTime('September 1, 2014');
// Go 1 day at a time
$interval = new DateInterval('P1D');

$range1 = new DatePeriod($start, $interval, $end);
