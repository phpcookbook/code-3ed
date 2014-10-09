<?php
function factorial($x) {
    return ($x == 1) ? 1 : $x * factorial($x - 1);
}

for ($i = 1; $i <= 50; $i++) {
    print "$i: " . factorial($i) . "\n";
}
