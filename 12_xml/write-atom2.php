<?php
    public function __construct($title, $href, $name, $id) {
        parent::__construct();
        $this->formatOutput = true;

        $this->ns = 'http://www.w3.org/2005/Atom';

        $root = $this->appendChild($this->createElementNS($this->ns, 'feed'));

        $root->appendChild(
            $this->createElementNS($this->ns, 'title', $title));
        $link = $root->appendChild(
            $this->createElementNS($this->ns, 'link'));
        $link->setAttribute('href', $href);
        $root->appendChild($this->createElementNS(
            $this->ns, 'updated', date(DATE_ATOM)));
        $author = $root->appendChild(
            $this->createElementNS($this->ns, 'author'));
        $author->appendChild(
            $this->createElementNS($this->ns, 'name', $name));
        $root->appendChild(
            $this->createElementNS($this->ns, 'id', $id'));
    }
