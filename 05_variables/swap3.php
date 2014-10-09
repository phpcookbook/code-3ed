<?php
$yesterday = 'pleasure';
$today = 'sorrow';
$tomorrow = 'celebrate';

list($yesterday,$today,$tomorrow) = array($today,$tomorrow,$yesterday);
// now $yesterday is 'sorrow', $today is 'celebrate'
// and $tomorrow is 'pleasure'
