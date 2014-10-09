<?php
require 'Net/Ping.php';
$ping = Net_Ping::factory();

$result = $ping->ping('www.oreilly.com');
print<<<_INFO_
Ping of www.oreilly.com ({$result->getTargetIp()})
with {$result->getTransmitted()} requests had
a minimum time of {$result->getMin()} ms and
a maximum time of {$result->getMax()} ms.
_INFO_
;
