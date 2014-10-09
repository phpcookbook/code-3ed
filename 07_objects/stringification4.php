<?php
class TextInput {
    // Rest of class here

    public function __toString() {
        return (string) $this->label;
    }
}
