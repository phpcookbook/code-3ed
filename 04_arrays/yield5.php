<?php
$line_number = 0;
foreach (FileLineGenerator('sayings.txt') as $line) {
    $line_number++;
    if (mt_rand(0, $line_number - 1) == 0) {
        $selected = $line;
    }
}

print $selected . "\n";
