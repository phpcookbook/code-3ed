<?php
$file = '/tmp/junk.txt';
unlink($file) or die ("can't delete $file: $php_errormsg");
