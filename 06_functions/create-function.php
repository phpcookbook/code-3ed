<?php
$increment = 7;

$add = create_function('$i,$j', 'return $i+$j + ' . $increment. ';');

$sum = $add(1, 2);

array($sum === 10);