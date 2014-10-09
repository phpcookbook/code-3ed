<?php
function incremental_total($numbers) {
    $total = 0;
    foreach ($numbers as $number => $weight) {
        $total += $weight;
        yield $number => $total;
    }
}

// returns the weighted randomly selected key
function rand_weighted_generator($numbers) {
    $total = array_sum($numbers);
    $rand = mt_rand(0, $total - 1);
    foreach (incremental_total($numbers) as $number => $weight) {
        if ($rand < $weight) { return $number; }
    }
}
