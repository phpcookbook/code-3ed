<?php
$food =  'pizza';
$drink = 'beer';

function party() {
    global $food, $drink;

    unset($food);             // eat pizza
    unset($GLOBALS['drink']); // drink beer
}

print "$food: $drink\n";
party();
print "$food: $drink\n";
