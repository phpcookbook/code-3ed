<?php

require 'Predis/Autoloader.php';
Predis\Autoloader::register();

$redis = new Predis\Client(array('host' => '127.0.0.1'));
$redis->set('counter', 0);
$redis->incrBy('counter', 7);
$counter = $redis->get('counter');
print $counter;
