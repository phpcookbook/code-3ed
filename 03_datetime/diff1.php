<?php
// 7:32:56 pm on May 10, 1965
$first = new DateTime("1965-05-10 7:32:56pm", new DateTimeZone('America/New_York'));
// 4:29:11 am on November 20, 1962
$second = new DateTime("1962-11-20 4:29:11am", new DateTimeZone('America/New_York'));
$diff = $second->diff($first);

printf("The two dates have %d weeks, %s days, " .
       "%d hours, %d minutes, and %d seconds " .
       "elapsed between them.",
       floor($diff->format('%a') / 7),
       $diff->format('%a') % 7,
       $diff->format('%h'),
       $diff->format('%i'),
       $diff->format('%s'));
