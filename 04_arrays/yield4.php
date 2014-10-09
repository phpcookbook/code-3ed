<?php
function FileLineGenerator($file) {
    if (!$fh = fopen($file, 'r')) {
        return;
    }
 
    while (false !== ($line = fgets($fh))) {
        yield $line;
    }
 
    fclose($fh);
}

$file = FileLineGenerator('log.txt');
foreach ($file as $line) {
    if (preg_match('/^rasmus: /', $line)) { print $line; }
}
