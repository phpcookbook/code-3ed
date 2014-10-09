<?php
class rss2 extends DOMDocument {
    private $channel;

    public function __construct($title, $link, $description) {
        parent::__construct();
        $this->formatOutput = true;

        $root = $this->appendChild($this->createElement('rss'));
        $root->setAttribute('version', '2.0');

        $channel= $root->appendChild($this->createElement('channel'));

        $channel->appendChild($this->createElement('title', $title));
        $channel->appendChild($this->createElement('link', $link));
        $channel->appendChild($this->createElement('description', $description));

        $this->channel = $channel;
    }

    public function addItem($title, $link, $description) {
        $item = $this->createElement('item');
        $item->appendChild($this->createElement('title', $title));
        $item->appendChild($this->createElement('link', $link));
        $item->appendChild($this->createElement('description', $description));
    
        $this->channel->appendChild($item);     
    }
}

$rss = new rss2('Channel Title', 'http://www.example.org', 
                'Channel Description');

$rss->addItem('Item 1', 'http://www.example.org/item1', 
              'Item 1 Description');
$rss->addItem('Item 2', 'http://www.example.org/item2', 
              'Item 2 Description');

print $rss->saveXML();


