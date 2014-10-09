<?php
function tab_expand($text) {
    while (strstr($text,"\t")) {
        $text = preg_replace_callback('/^([^\t\n]*)(\t+)/m',
        	                          'tab_expand_helper', $text);
    }
    return $text;
}

function tab_expand_helper($matches) {
    $tab_stop = 8;
    
    return $matches[1] .
    str_repeat(' ',strlen($matches[2]) * 
                       $tab_stop - (strlen($matches[1]) % $tab_stop));
}


$spaced = tab_expand($obj->message);
