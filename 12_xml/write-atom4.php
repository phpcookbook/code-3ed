<?php
$atom = new atom1('Channel Title', 'http://www.example.org', 
                'John Quincy Atom', 'http://example.org/atom/feed/ids/1');

$atom->addEntry('Item 1', 'http://www.example.org/item1', 
              'Item 1 Description', 'http://example.org/atom/entry/ids/1');

$atom->addEntry('Item 2', 'http://www.example.org/item2', 
              'Item 2 Description', 'http://example.org/atom/entry/ids/2');

print $atom->saveXML();
