<?php

function commercial_sponsorship($letter, $number) {
    print "This episode of Sesame Street is brought to you by ";
    print "the letter $letter and number $number.\n";
}

commercial_sponsorship('G', 3);

$another_letter = 'X';
$another_number = 15;
commercial_sponsorship($another_letter, $another_number);
