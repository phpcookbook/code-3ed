<?php
// Load XSL template
$xsl = new DOMDocument;
$xsl->load(__DIR__ . '/stylesheet.xsl');

// Create new XSLTProcessor
$xslt = new XSLTProcessor();                                                                                                                       
// Load stylesheet
$xslt->importStylesheet($xsl);

// Load XML input file
$xml = new DOMDocument;
$xsl->load(__DIR__ . '/address-book.xml');

// Transform to string
$results = $xslt->transformToXML($xml);

// Transform to a file
$results = $xslt->transformToURI($xml, 'results.txt');

// Transform to DOM object
$results = $xslt->transformToDoc($xml);
