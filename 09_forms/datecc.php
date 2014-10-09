<?php
// The beginning of the month in which the credit card expires
$expires = mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']);
// The beginning of the previous month
$lastMonth = strtotime('last month', $expires);
if (time() > $lastMonth) {
   print "Sorry, that credit card expires too soon.";
}
