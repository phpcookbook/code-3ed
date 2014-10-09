<?php
$file = __DIR__ . '/lots-of-data.gz';
$fh = fopen("compress.zlib://$file",'r') or die("can't open: $php_errormsg");
if ($fh) {
    while ($line = fgets($fh)) {
        // $line is the next line of uncompressed data
    }
    fclose($fh) or die("can't close: $php_errormsg");
}