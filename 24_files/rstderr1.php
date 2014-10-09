<?php
$ph = popen('strace ls 2>&1','r') or die($php_errormsg);
while (!feof($ph)) {
    $s = fgets($ph)               or die($php_errormsg);
}
pclose($ph)                       or die($php_errormsg);
