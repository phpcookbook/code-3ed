<?php
ini_set('auto_detect_line_endings', true);

$fh = fopen('books.txt','r') or die("can't open: $php_errormsg");
// rest of processing