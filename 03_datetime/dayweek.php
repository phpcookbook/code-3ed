<?php
print "Today is day " . date('d') . ' of the month and ' . date('z') . 
      ' of the year.';
print "\n";

$birthday = new DateTime('January 17, 1706', new DateTimeZone('EST5EDT'));

print "Benjamin Franklin was born on a " . $birthday->format('l') . ", " .
"day " . $birthday->format('N') . " of the week.";
