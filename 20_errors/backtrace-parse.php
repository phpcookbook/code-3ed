<?php

function print_parsed_backtrace() {
    $backtrace = debug_backtrace();
    for ($i = 1, $j = count($backtrace); $i < $j; $i++) {
        $frame = $backtrace[$i];
        if (isset($frame['class'])) {
            $function = $frame['class'] . $frame['type'] . $frame['function'];
        } else {
            $function = $frame['function'];
        }
        print $function . '()';
        if ($i != ($j - 1)) {
            print ', ';
        }
    }
}

function stooges() {
  print "woo woo woo!\n";
  Fine::larry();
}

class Fine {
    static function larry() {
        $brothers = new Howard;
        $brothers->curly();
    }
}
class Howard {
    function curly() {
        $this->moe();
    }
    function moe() {
        print_parsed_backtrace();
    }
}

stooges();
