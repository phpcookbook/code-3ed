<?php

function pick_color() {
    $colors = array('red','orange','yellow','blue','green','indigo','violet');
    $i = mt_rand(0, count($colors) - 1);
    return $colors[$i];
}

mt_srand(34534);
$first = pick_color();
$second = pick_color();

// Because a specific value was passed to mt_srand(), we can be
// sure the same colors will get picked each time: red and yellow
print "$first is red and $second is yellow.";
