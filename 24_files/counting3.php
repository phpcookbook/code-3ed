<?php
$records = 0;
$record_separator = '--end--';

if ($fh = fopen('great-american-textfile-database.txt','r')) {
  while (! feof($fh)) {
    $s = rtrim(fgets($fh));
    if ($s == $record_separator) {
      $records++;
    }
  }
}

print $records;

