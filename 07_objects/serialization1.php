<?php
class LogFile {
    protected $filename;
    protected $handle;
  
    public function __construct($filename) {
        $this->filename = $filename;
        $this->open();
    }

    private function open() {
        $this->handle = fopen($this->filename, 'a');
    }
  
    public function __destruct($filename) {
        fclose($this->handle);
    }
  
    // called when object is serialized
    // should return an array of object properties to serialize
    public function __sleep() {
        return array('filename');
    }
  
    // called when object is unserialized
    public function __wakeUp() {
        $this->open();
    }
}
