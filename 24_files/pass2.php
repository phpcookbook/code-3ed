<?php
$ph = popen('/usr/bin/nsupdate -k keyfile')               or die($php_errormsg);
if (-1 == fputs($ph,"update delete test.example.com A\n")) { die($php_errormsg); }
if (-1 == fputs($ph,"update add test.example.com 5 A 192.168.1.1\n"))
                                                           { die($php_errormsg); }
pclose($ph)                                               or die($php_errormsg);
