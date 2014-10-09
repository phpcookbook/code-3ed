<?php

$when = 1376943432; // Seconds since epoch
$message = "Maintenant: {0,date,eeee dd MMMM y}";
$fmt = new MessageFormatter('fr_FR', $message);
print $fmt->format(array($when));
