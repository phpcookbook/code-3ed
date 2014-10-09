<?php
// This could also come from $_GET['city'];
$city = 'San Francisco';

$dom  = new DOMDocument;
$dom->load(__DIR__ . '/address-book.xml');
$xsl  = new DOMDocument;
$xsl->load(__DIR__ . '/stylesheet.xsl');

$xslt = new XSLTProcessor(); 
$xslt->importStylesheet($xsl); 
$xslt->setParameter(NULL, 'city', $city); 
print $xslt->transformToXML($dom);
