<?php
require_once 'HTTP/Request2.php';

$r = new HTTP_Request2('http://slow.example.com/');
$r->setConfig(array(
    'connect_timeout' => 15
));

$page = $r->send()->getBody();