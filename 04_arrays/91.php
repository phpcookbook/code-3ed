<?php
class sort {
    // reverse-order string comparison
    static function strrcmp($a, $b) {
        return strcmp($b, $a);
    }
}

usort($words, array('sort', 'strrcmp'));
