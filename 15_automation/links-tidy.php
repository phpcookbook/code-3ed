<?php
$html=<<<_HTML_
<p>Some things I enjoy eating are:</p>
<ul>
<li><a href="http://en.wikipedia.org/wiki/Pickle">Pickles</a></li>
<li><a href="http://www.eatingintranslation.com/2011/03/great_ny_noodle.html">Salt-Baked Scallops</a></li>
<li><a href="http://www.thestoryofchocolate.com/">Chocolate</a></li>
</ul>
_HTML_;

$doc = new DOMDocument();
$opts = array('output-xhtml' => true,
              // Prevent DOMDocument from being confused about entities
              'numeric-entities' => true);
$doc->loadXML(tidy_repair_string($html,$opts));
$xpath = new DOMXPath($doc);
// Tell $xpath about the XHTML namespace
$xpath->registerNamespace('xhtml','http://www.w3.org/1999/xhtml');
foreach ($xpath->query('//xhtml:a/@href') as $node) {
    $link = $node->nodeValue;
    print $link . "\n";
}
