<?php
$haystack = 'The quick brown fox jumps over the lazy dog';
$needle = 'lazy dog';

// slowest (and deprecated)
if (ereg($needle, $haystack)) echo 'match!';

// slow
if (preg_match("/$needle/", $haystack)) echo 'match!';

// fast
if (strstr($haystack, $needle)) echo 'match!';

// fastest
if (strpos($haystack, $needle) !== false) echo 'match!';
