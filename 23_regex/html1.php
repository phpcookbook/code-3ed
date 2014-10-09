<?php
$html = file_get_contents(__DIR__ . '/example.html');
preg_match_all('@<h([1-6])>(.+?)</h\1>@is', $html, $matches);
foreach ($matches[2] as $text) {
    print "Heading: $text\n";
}