<?php

$when = 1376943432; // Seconds since epoch
$message = "It is {0,time,short} on {0,date,medium}.";
$fmt = new MessageFormatter('en_US', $message);
print $fmt->format(array($when));
