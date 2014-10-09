<?php
$ph = popen('/sbin/route','r') or die($php_errormsg);
while (! feof($ph)) {
    $s = fgets($ph)            or die($php_errormsg);
}
pclose($ph)                    or die($php_errormsg);

