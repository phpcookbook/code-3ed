<?php
$contents = file_get_contents('message.txt');
// convert *word* to <b>word</b>
$contents = preg_replace('@\*(.*?)\*@i','<b>$1</b>',$contents);
// convert /word/ to <i>word</i>
$contents = preg_replace('@/(.*?)/@i','<i>$1</i>',$contents);
file_put_contents('message.txt', $contents);
