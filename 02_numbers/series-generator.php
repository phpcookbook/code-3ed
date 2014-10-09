<?php

function squares($start, $stop) {
    if ($start < $stop) {
        for ($i = $start; $i <= $stop; $i++) {
            yield $i => $i * $i;
        }
    }
    else {
        for ($i = $stop; $i >= $start; $i--) {
            yield $i => $i * $i;
        }
    }
}

foreach (squares(3, 15) as $n => $square) {
    printf("%d squared is %d\n", $n, $square);
}