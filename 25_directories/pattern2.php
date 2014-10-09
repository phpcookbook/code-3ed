<?php
foreach (glob('/usr/local/docs/*.txt') as $file) {
   $contents = file_get_contents($file);
   print "$file contains $contents\n";
}
