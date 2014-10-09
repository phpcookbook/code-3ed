<?php
$username = 'foo411';

$start = microtime(true);

if (!preg_match('/^[a-z0-9]*/i', $username)) {
    echo 'please enter a valid username';
}

$regextime = microtime(true) - $start;

$start = microtime(true);

if (!ctype_alnum($username)) {
    echo 'please enter a valid username';
}

$ctypetime = microtime(true) - $start;

echo "preg_match took:  $regextime seconds\n";
echo "ctype_alnum took: $ctypetime seconds\n";