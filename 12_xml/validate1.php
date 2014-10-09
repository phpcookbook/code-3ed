<?php
$file = __DIR__ . '/address-book.xml';
$schema = __DIR__ . '/address-book.xsd';
$ab = new DOMDocument;
$ab->load($file);

if ($ab->schemaValidate($schema)) {
    print "$file is valid.\n";
} else {
    print "$file is invalid.\n";
}
