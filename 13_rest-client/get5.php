<?php
$vars = array('page' => 4, 'search' => 'this & that');
$qs = http_build_query($vars);
$url = 'http://www.example.com/search.php?' . $qs;
$page = file_get_contents($url);