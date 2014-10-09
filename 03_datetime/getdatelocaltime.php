<?php
$now_1 = getdate();
$now_2 = localtime();
print "{$now_1['hours']}:{$now_1['minutes']}:{$now_1['seconds']}\n";
print "$now_2[2]:$now_2[1]:$now_2[0]";
