<?php
date_default_timezone_set('EST5EDT');
$a = strtotime('2012-07-12 2pm MDT + 1 month');
print date(DATE_RFC850, $a);
