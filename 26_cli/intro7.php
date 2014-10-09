<?php
// read from standard in
$input = fgets(STDIN,1024);

// write to standard out
fwrite(STDOUT,$jokebook);

// write to standard error
fwrite(STDERR,$error_code);
