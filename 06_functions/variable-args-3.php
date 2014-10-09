<?php
// find the "average" of a group of numbers
function mean() {
    // initialize to avoid warnings
    $sum = 0;

    // the  arguments passed to the function
    $size = func_num_args();

    // iterate through the arguments and add up the numbers
    foreach (func_get_args() as $arg) {
        $sum += $arg;
    }

    // divide by the amount of numbers
    $average = $sum / $size;

    // return average
    return $average;
}

// $mean is 96.25
$mean = mean(96, 93, 98, 98);
