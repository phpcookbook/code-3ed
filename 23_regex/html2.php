<?php
$html = file_get_contents(__DIR__.'/example.html');
preg_match_all('@<(strong|em)>(.+?)</\1>@is', $html, $matches);
foreach ($matches[2] as $text) {
    print "Text: $text\n";
}