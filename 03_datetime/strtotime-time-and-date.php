<?php
$a = strtotime('5/12/2014');
print date(DATE_RFC850, $a);
print "\n";

$a = strtotime('12 may 2014');
print date(DATE_RFC850, $a);
