<?php
$four = gmp_add(2, 2);            // You can pass integers
$eight = gmp_add('4', '4');       // Or strings
$twelve = gmp_add($four, $eight); // Or GMP resources
