<?php
/* Loop through document */
while ($reader->read()) {
    /* If you're at an element named 'author' */
    if ($reader->nodeType == XMLREADER::ELEMENT && $reader->localName == 'author') {
        /* Process author element */ 
    }
}
