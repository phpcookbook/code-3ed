<?php
// Put all config values in an associative array
$vars = ini_get_all();
print_r($vars['date.timezone']);
