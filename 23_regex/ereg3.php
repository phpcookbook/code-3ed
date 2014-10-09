<?php
$hex = dechex($number);
preg_match("/\x$hex/", 'string');
