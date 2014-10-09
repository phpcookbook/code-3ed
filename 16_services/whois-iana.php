<?php
require 'Net/Whois.php';
$query  = 'oreilly.com';

$iana_server = 'whois.iana.org';

$whois = new Net_Whois();
$iana_data = $whois->query($query, $iana_server);
preg_match('/^whois:\s+(.+)$/m', $iana_data, $matches);
$tld_whois_server = $matches[1];

$tld_data = $whois->query($query, $tld_whois_server);

print $tld_data;


