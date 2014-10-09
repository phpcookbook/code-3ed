<?php
$reader = new XMLReader();
$reader->XML($catalog);

// Perl Cookbook ISBN is 0596003137
// Use array to make it easy to add additional ISBNs
$isbns = array('0596003137' => true);

/* Loop through document to find first <book> */
while ($reader->read()) {
    /* If you're at an element named 'book' */
    if ($reader->nodeType == XMLREADER::ELEMENT &&
        $reader->localName == 'book') {
        break;
    }
}

/* Loop through <book>s to find right ISBNs */
do {
    if ($reader->moveToAttribute('isbn') &&
        isset($isbns[$reader->value])) {
        while ($reader->read()) {
            switch ($reader->nodeType) {
            case XMLREADER::ELEMENT:
                print $reader->localName . ": ";
                break;
            case XMLREADER::TEXT:
                print $reader->value . "\n";
                break;
            case XMLREADER::END_ELEMENT;
                if ($reader->localName == 'book') {
                    break 2;
                }
            }
        }
    }
} while ($reader->next());
