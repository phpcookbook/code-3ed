<?php
require_once 'class.html2text.inc';
/* Give file_get_contents() the path or URL of the HTML you want to process */
$html = file_get_contents(__DIR__ . '/article.html');
$converter = new html2text($html);
$plain_text = $converter->get_text();
