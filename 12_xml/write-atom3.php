<?php
    public function addEntry($title, $link, $summary, $id) {
        $entry = $this->createElementNS($this->ns, 'entry');
        $entry->appendChild(
            $this->createElementNS($this->ns, 'title', $title));
        $entry->appendChild(
            $this->createElementNS($this->ns, 'link', $link));
        $entry->appendChild(
            $this->createElementNS($this->ns, 'id', $id));
        $entry->appendChild(
            $this->createElementNS($this->ns, 'updated', date(DATE_ATOM)));
        $entry->appendChild(
            $this->createElementNS($this->ns, 'summary', $summary));
    
        $this->documentElement->appendChild($entry);        
    }
