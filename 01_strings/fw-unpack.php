<?php
$fp = fopen('fixed-width-records.txt','r',true) or die ("can't open file");
while ($s = fgets($fp,1024)) {
    // an associative array with keys "title", "author", and "publication_year"
    $fields = unpack('A25title/A15author/A4publication_year',$s);
    // a function to do something with the fields
    process_fields($fields);
}
fclose($fp) or die("can't close file");
