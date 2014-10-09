<?php

/* This might come from user input or the browser */
define('LOCALE', 'en_US');
/* If you can't trust the locale, add some error checking
 * in case the file doesn't exist or can't be
 * unserialized. */
$messages = unserialize(file_get_contents(__DIR__ . '/' . LOCALE . '.ser'));

$candy = new MessageFormatter(LOCALE, $messages['CANDY']);
$favs = new MessageFormatter(LOCALE, $messages['FAVORITE_FOODS']);
print $favs->format(array($candy->format(array()))) . "\n";
