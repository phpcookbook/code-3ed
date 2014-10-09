<?php

$text = "Knock, knock. Who's there? r2d2!";
$words = preg_match_all('/\w+/', $text, $matches);
var_dump($matches[0]);