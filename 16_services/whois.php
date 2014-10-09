<?php
require 'Net/Whois.php';
$server = 'whois.godaddy.com';
$query  = 'oreilly.com';

$whois = new Net_Whois();
$data = $whois->query($query, $server);
