<?php
$s = simplexml_load_file(__DIR__ . '/address-book.xml');
$people = $s->xpath('/address-book/person');

foreach($people as $p) {
    list($firstname) = $p->xpath('firstname');
    list($lastname) = $p->xpath('lastname');
    
    print "$firstname $lastname\n";
}
