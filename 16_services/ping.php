<?php
require 'Net/Ping.php';

$ping = Net_Ping::factory();
if ($ping->checkHost('www.oreilly.com')) {
    print 'Reachable';
} else {
    print 'Unreachable';
}

$data = $ping->ping('www.oreilly.com');
