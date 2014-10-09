<?php
$increment = 7;
$add = function($i, $j) use ($increment) { return $i + $j + $increment; };

$sum = $add(1, 2);

array($sum === 10);