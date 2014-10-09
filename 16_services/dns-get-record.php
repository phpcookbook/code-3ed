<?php
$addrs = dns_get_record('www.yahoo.com', DNS_AAAA);
print_r($addrs);