<?php

$message = '{0, select, f {She} m {He} other {It}} went to the store.';

$fmt = new MessageFormatter('en_US', $message);

print $fmt->format(array('f')) . "\n";
print $fmt->format(array('m')) . "\n";
print $fmt->format(array('Unknown')) . "\n";
