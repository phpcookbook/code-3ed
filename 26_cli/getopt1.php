<?php
// accepts -a, -b, and -c
$opts1 = getopt('abc');

// accepts --alice and --bob
$opts2 = getopt('', array('alice','bob'));
