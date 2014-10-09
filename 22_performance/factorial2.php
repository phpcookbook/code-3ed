<?php
function factorial($x) {
    static $cache = [];

    if (isset($cache[$x])) return $cache[$x];

    $cache[$x] = (($x == 1) ? 1 : $x * factorial($x - 1));

    return $cache[$x];
}

for ($i = 1; $i <= 50; $i++) {
    print "$i: " . factorial($i) . "\n";
}
