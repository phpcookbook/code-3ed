<?php
$numbers = range(3, 7);
foreach ($numbers as $n) {
        printf("%d squared is %d\n", $n, $n * $n);
}
foreach ($numbers as $n) {
        printf("%d cubed is %d\n", $n, $n * $n * $n);
}
