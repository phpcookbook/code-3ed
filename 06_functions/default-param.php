<?php

function wrap_in_html_tag($text, $tag = 'strong') {
    return "<$tag>$text</$tag>";
}