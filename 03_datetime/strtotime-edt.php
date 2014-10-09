<?php
date_default_timezone_set('EST5EDT');
$a = strtotime('2012-07-12 2pm EDT + 1 month');
print date(DATE_RFC850, $a);
