<?php
$file = __DIR__ . '/address-book.xml';
$ab = new DOMDocument;
$ab->load($file);

$schema = file_get_contents(__DIR__ . '/address-book.xsd');

if ($ab->schemaValidateSource($schema)) {
    print "XML is valid.\n";
} else {
    print "XML is invalid.\n";
}
