<?php
$tweet = new Tweet;
$tweet->from('@rasmus')
    ->withStatus('PHP 6 released! #php')
    ->send();
