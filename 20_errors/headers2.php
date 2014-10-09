<?php
$file = '/path/to/file.php';

// backup
copy($file, "$file.bak") or die("Can't copy $file: $php_errormsg");

// read and trim
$contents = trim(join('',file($file)));

// write
$fh = fopen($file, 'w')  or die("Can't open $file for writing: $php_errormsg");
if (-1 == fwrite($fh, $contents)) { die("Can't write to $file: $php_errormsg"); }
fclose($fh)              or die("Can't close $file: $php_errormsg");
