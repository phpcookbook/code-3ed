<?php
$now = time();
date_default_timezone_set('America/New_York');
print date(DATE_RFC850, $now);
print "\n";

date_default_timezone_set('Europe/Paris');
print date(DATE_RFC850, $now);
