<?php
function array_stats($values) {
    $min = min($values);
    $max = max($values);
    $mean = array_sum($values) / count($values);

    return array($min, $max, $mean);
}

$values = array(1,3,5,9,13,1442);
list($min, $max, $mean) = array_stats($values);
