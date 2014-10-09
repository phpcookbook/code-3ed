<?php
$stream = fopen(__DIR__ . '/elephant.html','r');
stream_filter_append($stream, 'string.strip_tags',STREAM_FILTER_READ,'b,i');
print stream_get_contents($stream);
