<?php

class TagStripper {

    protected $allowed =
        array(
              /* Allow <a/> and only an "href" attribute */
              'a'=> array('href' => true),
              /* Allow <p/> with no attributes */
              'p' => array());

    public function strip($html) {
        /* Tell Tidy to produce XHTML */
        $xhtml = tidy_repair_string($html, array('output-xhtml' => true));

        /* Load the dirty HTML into a DOMDocument */
        $dirty = new DOMDocument;
        $dirty->loadXml($xhtml);
        $dirtyBody = $dirty->getElementsByTagName('body')->item(0);

        /* Make a blank DOMDocument for the clean HTML */
        $clean = new DOMDocument();
        $cleanBody = $clean->appendChild($clean->createElement('body'));

        /* Copy the allowed nodes from dirty to clean */
        $this->copyNodes($dirtyBody, $cleanBody);

        /* Return the contents of the clean body */
        $stripped = '';
        foreach ($cleanBody->childNodes as $node) {
            $stripped .= $clean->saveXml($node);
        }
        return trim($stripped);
    }

    protected function copyNodes(DOMNode $dirty, DOMNode $clean) {
        foreach ($dirty->attributes as $name => $valueNode) {
            /* Copy over allowed attributes */
            if (isset($this->allowed[$dirty->nodeName][$name])) {
                $attr = $clean->ownerDocument->createAttribute($name);
                $attr->value = $valueNode->value;
                $clean->appendChild($attr);
            }
        }
        foreach ($dirty->childNodes as $child) {
            /* Copy allowed elements */
            if (($child->nodeType == XML_ELEMENT_NODE) &&
                (isset($this->allowed[$child->nodeName]))) {
                    $node = $clean->ownerDocument->createElement($child->nodeName);
                    $clean->appendChild($node);
                    /* Examine children of this allowed element */
                    $this->copyNodes($child, $node);
            }
            /* Copy text */
            else if ($child->nodeType == XML_TEXT_NODE) {
                $text = $clean->ownerDocument->createTextNode($child->textContent);
                $clean->appendChild($text);
             }
        }
    }
}