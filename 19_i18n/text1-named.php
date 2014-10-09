<?php
$message = 'I like to eat {food} and {drink}.';
$fmt = new MessageFormatter('en_US', $message);
print $fmt->format(array('food' => 'eggs',
                         'drink' => 'water'));
