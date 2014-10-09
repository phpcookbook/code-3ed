<?php
function wrap_in_html_tag(&$text, $tag = 'strong') {
    $text = "<$tag>$text</$tag>";
}
