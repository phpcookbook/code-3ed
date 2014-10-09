<?php
// find the "average" of a group of numbers
function mean($numbers) {
    // initialize to avoid warnings
    $sum = 0;

    // the number of elements in the array
    $size = count($numbers);

    // iterate through the array and add up the numbers
    for ($i = 0; $i < $size; $i++) {
        $sum += $numbers[$i];
    }

    // divide by the amount of numbers
    $average = $sum / $size;

    // return average
    return $average;
}

// $mean is 96.25
$mean = mean(array(96, 93, 98, 98));
