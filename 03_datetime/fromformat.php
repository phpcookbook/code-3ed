<?php

$dates = array('01/02/2015', '03/06/2015', '09/08/2015');

foreach ($dates as $date) {
    $default = new DateTime($date);
    $day_first = DateTime::createFromFormat('d/m/Y|', $date);
    printf("The default interpretation is %s\n  but day-first is %s.\n",
           $default->format(DateTime::RFC850),
           $day_first->format(DateTime::RFC850));
}
