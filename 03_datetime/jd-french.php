<?php
// 13 Floréal XI
// $jd is 2379714, the Julian day count
$jd = cal_to_jd(CAL_FRENCH, 8, 13, 11);

$french = cal_from_jd($jd, CAL_FRENCH);
/* $french is array('date' => '8/13/11',
                    'month' => 8,
                    'day' => 13,
                    'year' => 11,
                    'dow' => 2,
                    'abbrevdayname' => 'Tue',
                    'dayname' => 'Tuesday',
                    'abbrevmonth' => 'Floreal',
                    'monthname' => 'Floreal'));
*/

// May 3, 1803 - sale of Louisiana to the US
$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is array('date' => '5/3/1803',
                       'month' => 5,
                       'day' => 3,
                       'year' => 1803,
                       'dow' => 2,
                       'abbrevdayname' => 'Tue',
                       'dayname' => 'Tuesday',
                       'abbrevmonth' => 'May',
                       'monthname' => 'May'));
*/