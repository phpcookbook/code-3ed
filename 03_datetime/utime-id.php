<?php
list($microseconds,$seconds) = explode(' ',microtime());
$id = $seconds.$microseconds.getmypid();