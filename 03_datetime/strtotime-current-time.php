<?php
$a = strtotime('now');
print date(DATE_RFC850, $a);
print "\n";

$a = strtotime('today');
print date(DATE_RFC850, $a);
