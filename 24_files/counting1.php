<?php
$lines = 0;

if ($fh = fopen('orders.txt','r')) {
  while (! feof($fh)) {
    if (fgets($fh)) {
      $lines++;
    }
  }
}

print $lines;
