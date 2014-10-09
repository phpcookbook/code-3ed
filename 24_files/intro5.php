<?php
$fh = fopen('/tmp/lines-of-data.txt','r') or die($php_errormsg);
while(false !== ($s = fgets($fh))) {
    $s = rtrim($s, "\r\n");
    // do something with $s ... 
}
fclose($fh)                               or die($php_errormsg);
