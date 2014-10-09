<?php
$dom = new DOMDocument;
$dom->load(__DIR__ . '/address-book.xml');
$xpath = new DOMXPath($dom);
$emails = $xpath->query('/address-book/person/email');
