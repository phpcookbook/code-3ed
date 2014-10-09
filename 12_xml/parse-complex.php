<?php
$dom = new DOMDocument;
$dom->load(__DIR__ . '/address-book.xml');

foreach ($dom->getElementsByTagname('person') as $person) {
    $firstname = $person->getElementsByTagname('firstname');
    $firstname_text_value = $firstname->item(0)->firstChild->nodeValue;

    $lastname = $person->getElementsByTagname('lastname');
    $lastname_text_value = $lastname->item(0)->firstChild->nodeValue;

    print "$firstname_text_value $lastname_text_value\n";
}