<?php

function wrap_in_html_tag($text, $tag = '') {
    if (empty($tag)) { return $text; }
    return "<$tag>$text</$tag>";
}