<?php
$file = file('log.txt');
foreach ($file as $line) {
    if (preg_match('/^rasmus: /', $line)) { print $line; }
}
