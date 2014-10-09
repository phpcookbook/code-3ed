<?php
// February 29, 1900 (not a Gregorian leap year)
// $jd is 2415092, the Julian day count
$jd = cal_to_jd(CAL_JULIAN, 2, 29, 1900);

$julian = cal_from_jd($jd, CAL_JULIAN);
/* $julian is array('date' => '2/29/1900',
                    'month' => 2,
                    'day' => 29,
                    'year' => 1900,
                    'dow' => 2,
                    'abbrevdayname' => 'Tue',
                    'dayname' => 'Tuesday',
                    'abbrevmonth' => 'Feb',
                    'monthname' => 'February'));
*/

$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is array('date' => '3/13/1900',
                       'month' => 3,
                       'day' => 13,
                       'year' => 1900,
                       'dow' => 2,
                       'abbrevdayname' => 'Tue',
                       'dayname' => 'Tuesday',
                       'abbrevmonth' => 'Mar',
                       'monthname' => 'March'));
*/