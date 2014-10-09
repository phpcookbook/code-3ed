<?php

define('LOCALE', 'en_US');
$bundle = new ResourceBundle(LOCALE, __DIR__);

$candy = new MessageFormatter(LOCALE, $bundle->get('CANDY'));
$favs = new MessageFormatter(LOCALE, $bundle->get('FAVORITE_FOODS'));
print $favs->format(array($candy->format(array()))) . "\n";
