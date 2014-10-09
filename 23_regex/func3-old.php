<?php
$callbackFunction = create_function('$matches',
                         'return html_entity_decode($matches[1]);');
$fp = fopen(__DIR__ . '/html-to-decode.html','r');
while (! feof($fp)) {
    $line = fgets($fp);
    print preg_replace_callback('@<code>(.*?)</code>@',$callbackFunction, $line);
}
fclose($fp);
