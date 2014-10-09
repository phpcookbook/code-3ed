<?php
$files = array('ziggy.txt', '10steps.doc', '11pants.org', "frank.mov");
// sort files in reverse natural order
usort($files, function($a, $b) { return strnatcmp($b, $a); });
// Now $files is
// array('ziggy.txt', 'frank.mov','11pants.org','10steps.doc')
