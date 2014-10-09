<?php
$text = "Knock, knock. Who's there? r2d2!";
$pattern = "/(?:\w'\w|\w)+/";
$words = preg_match_all($pattern, $text, $matches);
var_dump($matches[0]);