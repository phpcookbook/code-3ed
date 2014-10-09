<?php
$rss = new rss2('Channel Title', 'http://www.example.org', 
                'Channel Description');

$rss->addItem('Item 1', 'http://www.example.org/item1', 
              'Item 1 Description');
$rss->addItem('Item 2', 'http://www.example.org/item2', 
              'Item 2 Description');

print $rss->saveXML();
