<?php
function print_matching_lines($file, $regex) {
    if (!$fh = fopen('log.txt','r')) {
        return;
    }
    while(false !== ($line = fgets($fh))) {
        if (preg_match($regex, $line)) { print $line; }
    }
    fclose($fh);
}

print_matching_lines('log.txt', '/^rasmus: /');
