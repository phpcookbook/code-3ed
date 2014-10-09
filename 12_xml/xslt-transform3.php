<?php
// Load XML input file
$xml = new DOMDocument;
$xsl->load(__DIR__ . '/stylesheet.xsl');

// Transform to string
$results = $xslt->transformToXML($xml);

// Transform to a file
$results = $xslt->transformToURI($xml, 'results.txt');

// Transform to DOM object
$results = $xslt->transformToDoc($xml);
