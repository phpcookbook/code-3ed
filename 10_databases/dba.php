<?php
$dbh = dba_open(__DIR__ . '/fish.db','c','db4') or die($php_errormsg);

// retrieve and change values
if (dba_exists('flounder',$dbh)) {
  $flounder_count = dba_fetch('flounder',$dbh);
  $flounder_count++;
  dba_replace('flounder',$flounder_count, $dbh);
  print "Updated the flounder count.";
} else {
  dba_insert('flounder',1, $dbh);
  print "Started the flounder count.";
}

// no more tilapia
dba_delete('tilapia',$dbh);

// what fish do we have?
for ($key = dba_firstkey($dbh);  $key !== false; $key = dba_nextkey($dbh)) {
   $value = dba_fetch($key, $dbh);
   print "$key: $value\n";
}

dba_close($dbh);
