<?php

$args = array(7,159,-0.3782,6.815574);

$messages = array("0", "00", "1", "11", "222",
                  "#", "##", "@", "@@@",
                  "##%", "¤#", "¤1.11",
                  "¤¤#",
                  "#.##;(#.## !!!)"
                  );

foreach ($messages as $message) {
    $fmt = new MessageFormatter('en_US',"{0,number,$message}\t{1,number,$message}\t".
                                "{2,number,$message}\t{3,number,$message}");
    print "$message:\t" . $fmt->format($args) . "\n";
}
