<?php
$dom  = new DOMDocument;
$dom->loadXML('<blank/>');
$xsl  = new DOMDocument;
$xsl->load(__DIR__ . '/strftime.xsl');

$xslt = new XSLTProcessor(); 
$xslt->importStylesheet($xsl);
$xslt->registerPHPFunctions(); 
print $xslt->transformToXML($dom);