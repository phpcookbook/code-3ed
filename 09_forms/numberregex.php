<?php
// The pattern matches an optional - sign and then 
// at least one digit
if (! preg_match('/^-?\d+$/',$_POST['rating'])) {
    print 'Your rating must be an integer.';
}

// The pattern matches an optional - sign and then
// Optional digits to go before a decimal point
// An optional decimal point
// And then at least one digit
if (! preg_match('/^-?\d*\.?\d+$/',$_POST['temperature'])) {
   print 'Your temperature must be a number.';
}