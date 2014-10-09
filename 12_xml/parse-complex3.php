<?php
// find and print all authors
$authors = $dom->getElementsByTagname('author');

// loop through author elements
foreach ($authors as $author) { 
    // childNodes holds the author values
    $text_nodes = $author->childNodes;

    foreach ($text_nodes as $text) {    
         print $text->nodeValue . "\n";
    }
}