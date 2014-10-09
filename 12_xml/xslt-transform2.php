<?php
// Load XSL template
$xsl = new DOMDocument;
$xsl->load(__DIR__ . '/stylesheet.xsl');

// Create new XSLTProcessor
$xslt = new XSLTProcessor();                                                                                                                       
// Load stylesheet
$xslt->importStylesheet($xsl);
