<?php
$records = 0;
$record_separator = '--end--';

if ($fh = fopen('great-american-textfile-database.txt','r')) {
    $done = false;
    while (! $done) {
        $s = stream_get_line($fh, 65536, $record_separator);
        if (feof($fh)) {
            $done = true;
        } else {
            $records++;
        }
  }
}

print $records;
