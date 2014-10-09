<?php
$reader = new XMLReader();
$reader->open(__DIR__ . '/card-catalog.xml');

/* Loop through document */
while ($reader->read()) {
    /* If you're at an element named 'author' */
    if ($reader->nodeType == XMLREADER::ELEMENT && $reader->localName == 'author') {
        /* Move to the text node and print it out */
        $reader->read();
        print $reader->value . "\n";
    }
}