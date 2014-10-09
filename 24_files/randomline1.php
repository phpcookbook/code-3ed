<?php
$line_number = 0;

$fh = fopen(__DIR__ . '/sayings.txt','r') or die($php_errormsg);
while (! feof($fh)) {
    if ($s = fgets($fh)) {
        $line_number++;
        if (mt_rand(0, $line_number - 1) == 0) {
            $line = $s;
        }
    }
}
fclose($fh) or die($php_errormsg);

