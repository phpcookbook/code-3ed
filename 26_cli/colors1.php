<?php
$color = new Console_Color2();

$ok = $color->color('green');
$fail = $color->color('red');
$reset = $color->color('reset');

print $ok . "OK   " . $reset . "Something succeeded!\n";
print $fail . "FAIL " . $reset . "Something failed!\n";
