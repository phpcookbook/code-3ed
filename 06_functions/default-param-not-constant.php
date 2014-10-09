<?php
$my_favorite_html_tag = 'blink';

function wrap_in_html_tag($text, $tag = $my_favorite_html_tag) {
    return "<$tag>$text</$tag>";
}