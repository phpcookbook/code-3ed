<?php
$income = 5549.3;
$debit = -25.95;

$fmt = new MessageFormatter('en_US',
                            '{0,number,currency} in and {1,number,currency} out');

print $fmt->format(array($income,$debit));
