<?php
function mangle_email($nodes) {
    return preg_replace('/([^@\s]+)@([-a-z0-9]+\.)+[a-z]{2,}/is',
                        '$1@...',
                        $nodes[0]->nodeValue);
}

$dom  = new DOMDocument;
$dom->load(__DIR__ . '/address-book.xml');
$xsl  = new DOMDocument;
$xsl->load(__DIR__ . '/mangle-email.xsl');

$xslt = new XSLTProcessor(); 
$xslt->importStylesheet($xsl); 
$xslt->registerPhpFunctions(); 
print $xslt->transformToXML($dom);
