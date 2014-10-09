<?php
$ab = simplexml_load_file(__DIR__ . '/address-book.xml');

// the id attribute of the first person
print $ab->person['id'] . "\n";
