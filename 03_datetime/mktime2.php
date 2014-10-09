<?php
date_default_timezone_set('America/New_York');
// $stamp_future is 1733257500
$stamp_future = mktime(15,25,0,12,3,2024);
// $formatted is '2024-12-03T15:25:00-05:00'
$formatted = date('c', $stamp_future);
