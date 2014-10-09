<?php
$a = strtotime('last thursday');   // On February 12, 2013
print date(DATE_RFC850, $a);
print "\n";

$a = strtotime('2015-07-12 2pm + 1 month');
print date(DATE_RFC850, $a);
