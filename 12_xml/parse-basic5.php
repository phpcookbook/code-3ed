<?php
$sx = simplexml_load_file(__DIR__ . '/address-book.xml');

foreach ($sx->person as $person) {
    $firstname_text_value = $person->firstname;
    $lastname_text_value = $person->lastname;
    
    print "$firstname_text_value $lastname_text_value\n";
}
