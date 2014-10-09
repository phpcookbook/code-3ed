<?php
class atom1 extends DOMDocument {
    private $ns;

    public function __construct($title, $href, $name, $id) {
        parent::__construct();
        $this->formatOutput = true;

        $this->ns = 'http://www.w3.org/2005/Atom';

        $root = $this->appendChild($this->createElementNS($this->ns, 'feed'));

        $root->appendChild($this->createElementNS($this->ns, 'title', $title));
        $link = $root->appendChild($this->createElementNS($this->ns, 'link'));
        $link->setAttribute('href', $href);
        $root->appendChild($this->createElementNS($this->ns, 'updated',
            date('Y-m-d\\TH:i:sP')));
        $author = $root->appendChild($this->createElementNS($this->ns, 'author'));
        $author->appendChild($this->createElementNS($this->ns, 'name', $name));
        $root->appendChild($this->createElementNS($this->ns, 'id', $id));
    }

    public function addEntry($title, $link, $summary) {
        $entry = $this->createElementNS($this->ns, 'entry');
        $entry->appendChild($this->createElementNS($this->ns, 'title', $title));
        $entry->appendChild($this->createElementNS($this->ns, 'link', $link));

        $id = uniqid('http://example.org/atom/entry/ids/');
        $entry->appendChild($this->createElementNS($this->ns, 'id', $id));

        $entry->appendChild($this->createElementNS($this->ns, 'updated',
            date(DATE_ATOM)));
        $entry->appendChild($this->createElementNS($this->ns, 'summary',
    $summary));
    
        $this->documentElement->appendChild($entry);        
    }
}

$atom = new atom1('Channel Title', 'http://www.example.org', 
                'John Quincy Atom', 'http://example.org/atom/feed/ids/1');

$atom->addEntry('Item 1', 'http://www.example.org/item1', 
              'Item 1 Description', 'http://example.org/atom/entry/ids/1');

$atom->addEntry('Item 2', 'http://www.example.org/item2', 
              'Item 2 Description', 'http://example.org/atom/entry/ids/2');

print $atom->saveXML();
