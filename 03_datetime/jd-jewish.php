<?php
// 25 Kislev 5774 is the first night/day of Hanukah
// $jd is 2456625, the Julian day count
$jd = cal_to_jd(CAL_JEWISH, 3, 25, 5774);

$jewish = cal_from_jd($jd, CAL_JEWISH);
/* $jewish is array('date' => '3/25/5774',
                    'month' => 3,
                    'day' => 25,
                    'year' => 5774,
                    'dow' => 4,
                    'abbrevdayname' => 'Thu',
                    'dayname' => 'Thursday',
                    'abbrevmonth' => 'Kislev',
                    'monthname' => 'Kislev'));
*/

// November 28, 2013 is US Thanksgiving holiday
$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is array('date' => '11/28/2013',
                       'month' => 11,
                       'day' => 28,
                       'year' => 2013,
                       'dow' => 4,
                       'abbrevdayname' => 'Thu',
                       'dayname' => 'Thursday',
                       'abbrevmonth' => 'Nov',
                       'monthname' => 'November'));
*/