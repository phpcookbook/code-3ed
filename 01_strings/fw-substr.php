<?php
$fp = fopen('fixed-width-records.txt','r',true) or die ("can't open file");
while ($s = fgets($fp,1024)) {
    $fields[1] = substr($s,0,25);  // first field:  first 25 characters of the line
    $fields[2] = substr($s,25,15); // second field: next 15 characters of the line
    $fields[3] = substr($s,40,4);  // third field:  next 4 characters of the line
    $fields = array_map('rtrim', $fields); // strip the trailing whitespace
    // a function to do something with the fields
    process_fields($fields);
}
fclose($fp) or die("can't close file");
