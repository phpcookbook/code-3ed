<?php
// March 8, 1876
// $jd is 2406323, the Julian day count
$jd = gregoriantojd(3,9,1876);

$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is array('date' => '3/9/1876',
                       'month' => 3,
                       'day' => 9,
                       'year' => 1876,
                       'dow' => 4,
                       'abbrevdayname' => 'Thu',
                       'dayname' => 'Thursday',
                       'abbrevmonth' => 'Mar',
                       'monthname' => 'March'));
*/