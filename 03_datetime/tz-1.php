<?php

$nowInNewYork = new DateTime('now', new DateTimeZone('America/New_York'));
$nowInCalifornia = new DateTime('now', new DateTimeZone('America/Los_Angeles'));

printf("It's %s in New York but %s in California.",
       $nowInNewYork->format(DateTime::RFC850),
       $nowInCalifornia->format(DateTime::RFC850));