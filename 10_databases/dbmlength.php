<?php
$data_file = '/tmp/users.db';
$total_length = 0;
$dbh = dba_open($data_file,'r','db4');
$dbh or die("Can't open database $data_file");

$k = dba_firstkey($dbh);
while ($k) {
    $total_length += strlen(dba_fetch($k,$dbh));
    $k = dba_nextkey($dbh);
}

print "Total length of all passwords is $total_length characters.";

dba_close($dbh);
