<?php
$body = '
<p>I like pickles and herring.</p>

<a href="pickle.php"><img src="pickle.jpg"/>A pickle picture</a>

I have a herringbone-patterned toaster cozy.

<herring>Herring is not a real HTML element!</herring>
';

$words = array('pickle','herring');
$patterns = array();
$replacements = array();
foreach ($words as $i => $word) {
    $patterns[] = '/' . preg_quote($word) . '/i';
    $replacements[] = "<span class='word-$i'>$word</span>";
}

/* Tell Tidy to produce XHTML */
$xhtml = tidy_repair_string($body, array('output-xhtml' => true));

/* Load the XHTML as an XML document */
$doc = new DOMDocument;
$doc->loadXml($xhtml);

/* When turning our input HTML into a proper XHTML document,
 * Tidy puts the input HTML inside the <body/> element of the
 * XHTML document */
$body = $doc->getElementsByTagName('body')->item(0);

/* Visit all text nodes and mark up words if necessary */
$xpath = new DOMXpath($doc);
foreach ($xpath->query("descendant-or-self::text()", $body) as $textNode) {
    $replaced = preg_replace($patterns, $replacements, $textNode->wholeText);
    if ($replaced !== $textNode->wholeText) {
        $fragment = $textNode->ownerDocument->createDocumentFragment();
        /* This makes sure that the <span/> sub-nodes are created properly */
        $fragment->appendXml($replaced);
        $textNode->parentNode->replaceChild($fragment, $textNode);
    }
}

/* Build the XHTML consisting of the content of everything under <body/> */
$markedup = '';
foreach ($body->childNodes as $node) {
    $markedup .= $doc->saveXml($node);
}
print $markedup;
