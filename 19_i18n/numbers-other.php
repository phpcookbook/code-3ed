<?php

$message = '{0,number,currency},  {0,number,percent}';
$us = new MessageFormatter('en_US',$message);
print $us->format(array(3.33333333));
