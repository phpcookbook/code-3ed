<?php

$message = '{0,number} / {1,number} = {2,number}';
$args = array(5327, 98, 5327/98);

$us = new MessageFormatter('en_US',$message);
$fr = new MessageFormatter('fr_FR',$message);
print $us->format($args) . "\n";
print $fr->format($args) . "\n";
