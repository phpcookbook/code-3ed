<?php
$s = simplexml_load_file(__DIR__ . '/address-book.xml');
$emails = $s->xpath('/address-book/person/email');

foreach ($emails as $email) {
    // do something with $email
}
